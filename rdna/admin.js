jQuery(document).ready(function($) {



    // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
    $('#load-news').click(function() {
        jQuery.post(ajax_object.ajax_url, { action: 'load_news' }, function(response) {
            console.log(response)

        })
    })

    $('#run-audit').click(function() {
        jQuery.post(ajax_object.ajax_url, ajax_object, function(responses) {
            responses = JSON.parse(responses)
            console.log(responses)
            response = responses[0]
            viz = response['viz']
            ranks = response.ranks
            $('.response').html(viz)
            ranksCont = $('<div>')
            ranksCont.addClass("rankings")
            for (label in ranks) {
                div = $('<div>')
                header = $('<h3>')
                header.text(label)
                list = $('<ul>')
                for (entity in ranks[label]) {
                    item = $('<li>')
                    item.text(entity)
                    list.append(item)
                }
                div.append(header)
                div.append(list)
                ranksCont.append(div)

            }
            $('.response').append(ranksCont)
            people = []
            for (key in responses) {
                // console.log(response)
                response = responses[key]
                ranks = response.ranks
                for (label in ranks) {
                    // console.log(label)
                    if (label == "PERSON") {
                        for (entity in ranks[label]) {
                            // console.log(entity)
                            people.push(entity)
                        }
                    }
                }
            }
            // console.log(people)
            peopleHTML = $('<div>')
            peopleHTML.addClass("people")
            list = $('<ul>')
            for (key in people) {
                person = people[key]
                item = $('<li>')
                item.text(person)
                list.append(item)

            }
            peopleHTML.append(list)
            $('.response').append(peopleHTML)

        });



    })
})