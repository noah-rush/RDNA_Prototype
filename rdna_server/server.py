import flask
from flask import request
from urllib.parse import unquote_plus

app = flask.Flask(__name__)
app.config["DEBUG"] = True

from flask import send_file
import multidict as multidict

import spacy
import json
import geocoder
from spacy import displacy
from bs4 import BeautifulSoup
import numpy as np
from wordcloud import WordCloud, STOPWORDS
import matplotlib.pyplot as plt
import pandas as pd
from PIL import Image 
import PIL 
import re
import random
  
# Load English tokenizer, tagger, parser and NER
nlp = spacy.load("en_core_web_sm")

# Process whole documents
text = ("When Sebastian Thrun started working on self-driving cars at "
        "Google in 2007, few people outside of the company took him "
        "seriously. “I can tell you very senior CEOs of major American "
        "car companies would shake my hand and turn away because I wasn’t "
        "worth talking to,” said Thrun, in an interview with Recode earlier "
        "this week.")



def locate(content, headline):
	locator_tags = []
	spots = []
	for tag in headline:
		if tag[1] == "GPE"  or tag[1] == "LOC":
			locator_tags.append(tag[0])
	for tag, words in content.items():
		if tag == "LOC" or tag =="GPE" :
			for word, rank in words.items():
				locator_tags.append(word)

	print(locator_tags)
	iter_locator = set(locator_tags)
	iter_locator = list(iter_locator)
	# locator_tags = list(locator_tags)
	for word in iter_locator:
		spot = {}
		g = geocoder.osm(word)
		if g.json != None:
			spot['word'] = word
			spot['address'] = g.json
			spot['rank'] = rank
			spot['headline'] = False
			spot['placerank'] = g.json['place_rank']
			spot['score'] = spot['rank'] * spot['address']['place_rank']
			spot['accuracy'] = spot['address']['accuracy']
			spot['relevance'] = sum([ locator_tags.count(x.strip()) for x in g.json['address'].split(",")])
			spot['score'] = spot['score'] * spot['address']['accuracy'] * spot['relevance']
			if spot['placerank'] <21:
				spots.append(spot)


	cities = set()
	towns = set()
	neighborhoods = set()
	states = set()
	counties = set()
	villages = set()

	spots  = sorted(spots, key=lambda spot: spot['score'], reverse=True)

	for spot in spots:
		print(spot)
		if spot['address']['accuracy'] > 0.3 and 'city' in spot['address']:
			cities.add(spot['address']['city'])
		if spot['address']['accuracy'] > 0.3 and 'town' in spot['address']:
			towns.add(spot['address']['town'])
		if spot['address']['accuracy'] > 0.3 and 'neighborhood' in spot['address']:
			neighborhoods.add(spot['address']['neighborhood'])
		if spot['address']['accuracy'] > 0.3 and 'state' in spot['address']:
			states.add(spot['address']['state'])
		if spot['address']['accuracy'] > 0.3 and 'county' in spot['address']:
			counties.add(spot['address']['county'])
		if spot['address']['accuracy'] > 0.3 and 'village' in spot['address']:
			villages.add(spot['address']['village'])

	spots = [spot for spot in spots if spot['relevance'] > 1]

	if len(spots) == 0:
		for city in list(cities):
			for state in list(states):
				spot = {}
				g = geocoder.osm(city + ", " + state)
				if g.json != None:
					spot['word'] = word
					spot['address'] = g.json
					spot['rank'] = rank
					spot['headline'] = False
					spot['placerank'] = g.json['place_rank']
					spot['score'] = spot['rank'] * spot['address']['place_rank']
					spot['accuracy'] = spot['address']['accuracy']
					print([ locator_tags.count(x) for x in g.json['address'].split(",") ])
					spot['relevance'] = sum([ locator_tags.count(x.strip()) for x in g.json['address'].split(",")])
					spot['score'] = spot['score'] * spot['address']['accuracy'] * spot['relevance']
					if spot['placerank'] <21:
						spots.append(spot)
		for city in list(towns):
			for state in list(states):
				spot = {}
				g = geocoder.osm(city + ", " + state)
				if g.json != None:
					spot['word'] = word
					spot['address'] = g.json
					spot['rank'] = rank
					spot['headline'] = False
					spot['placerank'] = g.json['place_rank']
					spot['score'] = spot['rank'] * spot['address']['place_rank']
					spot['accuracy'] = spot['address']['accuracy']
					print([ locator_tags.count(x) for x in g.json['address'].split(",") ])
					spot['relevance'] = sum([ locator_tags.count(x.strip()) for x in g.json['address'].split(",")])
					spot['score'] = spot['score'] * spot['address']['accuracy'] * spot['relevance']
					if spot['placerank'] <21:
						spots.append(spot)
		for city in list(villages):
			for state in list(states):
				spot = {}
				g = geocoder.osm(city + ", " + state)
				if g.json != None:
					spot['word'] = word
					spot['address'] = g.json
					spot['rank'] = rank
					spot['headline'] = False
					spot['placerank'] = g.json['place_rank']
					spot['score'] = spot['rank'] * spot['address']['place_rank']
					spot['accuracy'] = spot['address']['accuracy']
					print([ locator_tags.count(x) for x in g.json['address'].split(",") ])
					spot['relevance'] = sum([ locator_tags.count(x.strip()) for x in g.json['address'].split(",")])
					spot['score'] = spot['score'] * spot['address']['accuracy'] * spot['relevance']
					if spot['placerank'] <21:
						spots.append(spot)

	spots  = sorted(spots, key=lambda spot: spot['score'], reverse=True)




	geog = {"cities":list(cities), "states":list(states), "towns": list(towns), "neighborhoods":list(neighborhoods), "villages":list(villages), "counties":list(counties)}



	return spots, geog

def getFrequencyDictForText(sentence):
    fullTermsDict = multidict.MultiDict()
    tmpDict = {}

    # making dict for counting frequencies
    for text in sentence.split(" "):
        if re.match("a|the|an|the|to|in|for|of|or|by|with|is|on|that|be", text):
            continue
        val = tmpDict.get(text, 0)
        tmpDict[text.lower()] = val + 1
    for key in tmpDict:
        fullTermsDict.add(key, tmpDict[key])
    return fullTermsDict

def grey_color_func(word, font_size, position, orientation, random_state=None,
                    **kwargs):
    return "hsl(0, 0%%, %d%%)" % random.randint(60, 100)



def get_word_cloud(words):
	# text =getFrequencyDictForText(words)
	wordcloud = WordCloud(width = 800, height = 800,
	                background_color = '#2C3E50',
	                min_font_size = 10).generate_from_frequencies(words)
	# im1 = wordcloud.save("geeks.jpg")
	wordcloud.recolor(color_func=grey_color_func, random_state=3)
	wordcloud.to_file('N.jpg')

	return wordcloud





@app.route('/', methods=['GET'])
def home():
	return "papapap"

@app.route('/api', methods=['GET'])
def api():
	title = request.args.get('title')
	article = request.args.get('article')
	preSplit = unquote_plus(article)
	soup = BeautifulSoup(preSplit, 'html.parser')
	ps = soup.find_all('p')
	article = flask.Markup(unquote_plus(article)).striptags()
	htmls = []
	labels = {}
	for p in ps:
		doc = nlp(flask.Markup(p).striptags())
		for entity in doc.ents:
			if entity.label_ not in labels:
				labels[entity.label_] = {}
				labels[entity.label_][entity.text]= 1
			else:
				if entity.text in labels[entity.label_]:
					labels[entity.label_][entity.text] += 1
				else:
					labels[entity.label_][entity.text] = 1
		html = displacy.render(doc, style="ent")
		htmls.append(html)
	titleNLP = nlp(title)
	titleData = []
	for entity in titleNLP.ents:
		titleData.append((entity.text, entity.label_))
	for key, vals in labels.items():
		labels[key] = dict(sorted(vals.items(), key=lambda item: item[1]))
	html = "".join(htmls)
	output = {"viz":html, "ranks":labels, "headline": titleData, "title":title }


	location, geog = locate(labels,titleData)
	output['location'] = location
	output['geog'] = geog

	return output
	return "shoon"

@app.route('/allText', methods=['GET'])
def allText():
	text = request.args.get('text')
	text = flask.Markup(unquote_plus(text)).striptags()
	doc = nlp(text)
	cloudText = {}

	for entity in doc.ents:
		if entity.label_ == "ORG":
			if entity.text not in cloudText:
				cloudText[entity.text] = 0
				cloudText[entity.text] += 1
			else:
				cloudText[entity.text] +=1
	wordcloud = get_word_cloud(cloudText)
	return send_file("N.jpg", mimetype="image/jpeg", as_attachment=True)

app.run()