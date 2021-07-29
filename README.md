# RDNA_Prototype

## About
This is a prototype for a final class project in Cornell Tech's product studio. Our team focused on how to help local news. In the past 20 years, local news outlets have been decimated by changing ad infrastructure, yet they serve as a crucial part of our civic life and democracy. After talking to people in the industry, including academics, non-profit leaders, and publishers themselves, we identified one problem that local news stuggles with compared to larger news sites, some of which have seen a digital rebound. The issue we chose to focus on was getting a retaining subscribers. Inspired by this project (https://brown.columbia.edu/introducing-mapping-local-news-project-with-the-lenfest-institute-for-journalism/) we aimed to create an automated tool for local news sites that would analyze their content, and present their impact/footprint in an attractive, data-forward manner to potential subscribers, funders or advertisers. We want the tool to be easily integrated into existing news sites, so we built a wordpress plugin. This is a simple prototype, that analyzes articles for locations, pulls out specific organizations or people that the sites cover, and generates a beautiful long-scroll page for the publishers to share, all in one-click. For more information about our project, click here (https://docs.google.com/presentation/d/1-luxWvAO7gKETBDy-y1t5lexK89aFhd-QXP7RgRvKSw/edit?usp=sharing).

## Implementation
There are two sections in this repository, rdna_server creates a server that performs NLP analysis when fed the articles from wordpress, and rdna is a fully contained wordpress plugin. For the server, we use spacy to perform named-entity recognition on the articles. We take words tagged as geo-political entities (GPE), or locations (LOC), and attempt to localize the articles using OpenStreetMaps geocoding service. We also use a wordcloud plugin to generate a visualization for organizations, which represents a quick visualization of who and what the paper frequently covers. The plugin is a one-click plugin, that pulls all the wordpress posts and sends them to our server. It then generates the long-scroll template. The plugin is built off of the acf repeater functionality.

To run, you have to add the plugin to a wordpress plugin directory, I won't go into that here but it is easily googleable.

For the server, we use ngrok to display the server globally from a local machine. 

## Demo 

## Todo
