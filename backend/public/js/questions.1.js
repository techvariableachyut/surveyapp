var json = {
  title: "Gender in News Monitoring Tool", showProgressBar: "bottom", 
  pages: [
      {
        questions: [
            {
                type: "html",
                name: "homeTemplate",
                html: homeTemplate
            }
        ]
      },
      {
        title: "Selectoin of Section to be completed for this entry",
        questions: [
          {
            "type": "checkbox",
            "name": "section",
            title: "Besides the compulsory sections (1-5), please select the optional sections you will be completing for this entry. ",
            "colCount": 1,
            "choices": [
                "Section 7 - Images",
                "Section 8 - Social media",
                "Section 9 - Gender based violence",
                "Section 10 - Elections and political participation",
                "Section 11 - Sexual orientation and gender identity (LGBT)",
                "Section 12 - Peace and conflict",
                "Section 13 - Ethnicity and religion",
                "Section 14 - Disability",
                "Section 15 - HIV and AIDS",
                "Section 16 - Advertising"
            ]
          }
        ]
      },
      {
          title: "Administrative information",
          questions: [
              {
                  type: "dropdown",
                  name: "monitor",
                  title: "Name of monitor?",

                  choices: [
                      "Monitor 1",
                      "Monitor 2",
                      "Monitor 3", 
                      "Monitor 4", 
                      "Monitor 5", 
                      "Monitor 6", 
                      "Monitor 7", 
                      "Monitor 8", 
                      "Monitor 9", 
                      "Monitor 10",                        
                  ]
              },
              {
                  type: "dropdown",
                  name: "state",
                  title: "Region/State",

                  choices: [
                      "Ayewaddy",
                      "Chin",
                      "Kachin", 
                      "Kayah", 
                      "Kayin", 
                      "Magway", 
                      "Mandalay", 
                      "Mon", 
                      "Nay Pyi Taw", 
                      "Rakhine",  
                      "Sagaing",
                      "Shan",
                      "Tanintharyi",
                      "Yangon"                      
                  ]
              } , 
              {
                  type: "dropdown",
                  name: "media",
                  title: "Name of media These will change based on the country ",

                  choices: [
                      "7 Day News",
                      "8 Days",
                      "BBC", 
                      "Channel-7", 
                      "Cherry FM", 
                      "Chin World", 
                      "Chinland Today", 
                      "Crime News Journal", 
                      "Democracy Today", 
                      "DVB",                        
                  ]
              },

                {
                    type: "text",
                    name: "tracking",
                    placeHolder: "Tracking code",

                    title: "Tracking code"
                },

                {
                    type: "dropdown",
                    name: "Ownership",
                    title: "Ownership",

                    choices: [
                        "Community",
                        "Ethnic",
                        "Government", 
                        "Joint Venture", 
                        "Military", 
                        "Private", 
                        "Public", 
                        "State"                      
                    ]
                },
                {
                    type: 'dropdown',
                    name: 'medium',
                    title: 'Medium',
                    isRequired: true,
                    choices:[
                        'Online',
                        'Print',
                        'Radio',
                        'Social Media',
                        'Television'
                    ]
                },
                {
                    type: 'dropdown',
                    name: 'language',
                    title: 'Language',
                    isRequired: true,
                    choices: [
                        'Burmese',
                        'English',
                        'Falam',
                        'Gaybar',
                        'Gaykho',
                        'Hakha',
                        'Jingpaw',
                        'Kayar',
                        'Kokant',
                        'Matupi',
                        'Mindat',
                        'Mon',
                        'Pao',
                        'Poe Kayin',
                        'Rakhine',
                        'Sgaw Kayin',
                        'Shan',
                        'Shanni',
                        "Ta’ang",
                        'Tedim',
                        'Wa',
                        'Other (please specify)*'
                    ]
                },
                {
                    type:'dropdown',
                    name: 'genre',
                    title: 'Genre',
                    isRequired: true,
                    choices: [
                        'News content',
                        'Advert'
                    ]
                },
                {
                    type: 'dropdown',
                    name: 'frequency',
                    title: 'Frequency',
                    isRequired: true,
                    choices: [
                        'Daily',
                        'Bi-weekly',
                        'Weekly',
                        'Bi monthly',
                        'Monthly',
                        'Less than monthly'
                    ]
                   
                },
                {
                    type: 'dropdown',
                    name: 'tv',
                    title: 'For TV',
                    isRequired: true,
                    choices: [
                        'Sign language',
                        'No sign language'
                    ] 
                },
                {
                    "name": "include_date",
                    "type": "datepicker",
                    "inputType": "date",
                    "title": "Your favorite date:",
                    "dateFormat": "mm/dd/yy",
                    "isRequired": true
                }
                

          ]
      }, {
          title: "News Sources",
          visibleIf: "{section} contains 'Section 8 - Social media' ",
          questions: [
              {
                  type: "dropdown",
                  name: "price01",
                  title: "Compared to our competitors, do you feel the Product is",
                  choices: [0,1,2,3,4,5,6,7,8,9,10,'10+']
              }, {
                  type: "dropdown",
                  name: "price02",
                  colCount: 4,
                  title: "Compared to our competitors, do you feel the Product is",
                  choices: [0,1,2,3,4,5,6,7,8,9,10,'10+']
              },
              {
                  type: "dropdown",
                  name: "price03",
                  colCount: 4,
                  title: "Compared to our competitors, do you feel the Product is",
                  choices: [0,1,2,3,4,5,6,7,8,9,10,'10+']
              }, {
                  type: "dropdown",
                  name: "price04",
                  colCount: 4,
                  title: "Compared to our competitors, do you feel the Product is",
                  choices: [0,1,2,3,4,5,6,7,8,9,10,'10+']
              }
          ]
      }, 
      {
          visibleIf: "{section} contains 'Section 7 - Images' ",
          title: "Images",
          questions: [     
            {
                type: "dropdown",
                name: "Ownership01",
                title: "Ownership",
                isRequired: true,
                choices: [
                    "Community",
                    "Ethnic",
                    "Government", 
                    "Joint Venture", 
                    "Military", 
                    "Private", 
                    "Public", 
                    "State"                      
                ]
            },
            {
                type: 'dropdown',
                name: 'medium01',
                title: 'Medium',
                isRequired: true,
                choices:[
                    'Online',
                    'Print',
                    'Radio',
                    'Social Media',
                    'Television'
                ]
            },
            {
                type: 'dropdown',
                name: 'language01',
                title: 'Language',
                isRequired: true,
                choices: [
                    'Burmese',
                    'English',
                    'Falam',
                    'Gaybar',
                    'Gaykho',
                    'Hakha',
                    'Jingpaw',
                    'Kayar',
                    'Kokant',
                    'Matupi',
                    'Mindat',
                    'Mon',
                    'Pao',
                    'Poe Kayin',
                    'Rakhine',
                    'Sgaw Kayin',
                    'Shan',
                    'Shanni',
                    "Ta’ang",
                    'Tedim',
                    'Wa',
                    'Other (please specify)*'
                ]
            },
            {
                type:'dropdown',
                name: 'genre01',
                title: 'Genre',
                isRequired: true,
                choices: [
                    'News content',
                    'Advert'
                ]
            },
            {
                type: 'dropdown',
                name: 'frequency01',
                title: 'Frequency',
                isRequired: true,
                choices: [
                    'Daily',
                    'Bi-weekly',
                    'Weekly',
                    'Bi monthly',
                    'Monthly',
                    'Less than monthly'
                ]
               
            },
            {
                type: 'dropdown',
                name: 'tv01',
                title: 'For TV',
                isRequired: true,
                choices: [
                    'Sign language',
                    'No sign language'
                ] 
            },
            {
                "name": "include_date01",
                "type": "datepicker",
                "inputType": "date",
                "title": "Your favorite date:",
                "dateFormat": "mm/dd/yy",
                "isRequired": true
            }

          ]
      },
      {
          visibleIf: "{section} contains 'Section 9 - Gender based violence' ",
          title: "Gender based violence",
          questions: [
            {
                type: 'dropdown',
                name: 'frequency02',
                title: 'Frequency',
                isRequired: true,
                choices: [
                    'Daily',
                    'Bi-weekly',
                    'Weekly',
                    'Bi monthly',
                    'Monthly',
                    'Less than monthly'
                ]
               
            },
            {
                type: 'dropdown',
                name: 'tv02',
                title: 'For TV',
                isRequired: true,
                choices: [
                    'Sign language',
                    'No sign language'
                ] 
            },

            {
                "name": "include_date02",
                "type": "datepicker",
                "inputType": "date",
                "title": "Your favorite date:",
                "dateFormat": "mm/dd/yy",
                "isRequired": true
            }
          ]
      },
      {
        visibleIf: "{section} contains 'Section 10 - Elections and political participation' ",
          title: "Elections and political participation",
          questions: [
            {
                type: 'dropdown',
                name: 'frequency03',
                title: 'Frequency',
                isRequired: true,
                choices: [
                    'Daily',
                    'Bi-weekly',
                    'Weekly',
                    'Bi monthly',
                    'Monthly',
                    'Less than monthly'
                ]
               
            },
            {
                type: 'dropdown',
                name: 'tv03',
                title: 'For TV',
                isRequired: true,
                choices: [
                    'Sign language',
                    'No sign language'
                ] 
            },
          ]
      },
      {
        visibleIf: "{section} contains 'Section 11 - Sexual orientation and gender identity (LGBT)' ",
          title: "Sexual orientation and gender identity",
          questions: [
            {
                type: 'dropdown',
                name: 'frequency04',
                title: 'Frequency',
                isRequired: true,
                choices: [
                    'Daily',
                    'Bi-weekly',
                    'Weekly',
                    'Bi monthly',
                    'Monthly',
                    'Less than monthly'
                ]
               
            },
            {
                type: 'dropdown',
                name: 'tv04',
                title: 'For TV',
                isRequired: true,
                choices: [
                    'Sign language',
                    'No sign language'
                ] 
            },
            {
                "name": "include_date03",
                "type": "datepicker",
                "inputType": "date",
                "title": "Your favorite date:",
                "dateFormat": "mm/dd/yy",
                "isRequired": true
            }
          ]
      },
      {
        visibleIf: "{section} contains 'Section 12 - Peace and conflict' ",
          title: "Peace and conflict",
          questions: [
            {
                type: 'dropdown',
                name: 'frequency05',
                title: 'Frequency',
                isRequired: true,
                choices: [
                    'Daily',
                    'Bi-weekly',
                    'Weekly',
                    'Bi monthly',
                    'Monthly',
                    'Less than monthly'
                ]
               
            },
            {
                type: 'dropdown',
                name: 'tv05',
                title: 'For TV',
                isRequired: true,
                choices: [
                    'Sign language',
                    'No sign language'
                ] 
            },
            {
                "name": "include_date05",
                "type": "datepicker",
                "inputType": "date",
                "title": "Your favorite date:",
                "dateFormat": "mm/dd/yy",
                "isRequired": true
            }
          ]
      },
      {
        visibleIf: "{section} contains 'Section 13 - Ethnicity and religion' ",
          title: "Ethnicity and religion",
          questions: [
            {
                type: 'dropdown',
                name: 'frequency06',
                title: 'Frequency',
                isRequired: true,
                choices: [
                    'Daily',
                    'Bi-weekly',
                    'Weekly',
                    'Bi monthly',
                    'Monthly',
                    'Less than monthly'
                ]
               
            },
            {
                type: 'dropdown',
                name: 'tv06',
                title: 'For TV',
                isRequired: true,
                choices: [
                    'Sign language',
                    'No sign language'
                ] 
            }
          ]
      },
      {
        visibleIf: "{section} contains 'Section 14 - Disability' ",
          title: "Disability",
          questions: [
            {
                type: 'dropdown',
                name: 'frequency07',
                title: 'Frequency',
                isRequired: true,
                choices: [
                    'Daily',
                    'Bi-weekly',
                    'Weekly',
                    'Bi monthly',
                    'Monthly',
                    'Less than monthly'
                ]
               
            },
            {
                type: 'dropdown',
                name: 'tv07',
                title: 'For TV',
                isRequired: true,
                choices: [
                    'Sign language',
                    'No sign language'
                ] 
            },
            {
                "name": "include_date07",
                "type": "datepicker",
                "inputType": "date",
                "title": "Your favorite date:",
                "dateFormat": "mm/dd/yy",
                "isRequired": true
            }
          ]
      }, 
      {
        visibleIf: "{section} contains 'Section 15 - HIV and AIDS' ",
          title: "HIV and AIDS",
          questions: [
            {
                type: 'dropdown',
                name: 'frequency08',
                title: 'Frequency',
                isRequired: true,
                choices: [
                    'Daily',
                    'Bi-weekly',
                    'Weekly',
                    'Bi monthly',
                    'Monthly',
                    'Less than monthly'
                ]
               
            },
            {
                type: 'dropdown',
                name: 'tv08',
                title: 'For TV',
                isRequired: true,
                choices: [
                    'Sign language',
                    'No sign language'
                ] 
            },
            {
                "name": "include_date04",
                "type": "datepicker",
                "inputType": "date",
                "title": "Your favorite date:",
                "dateFormat": "mm/dd/yy",
                "isRequired": true
            }
          ]
      },
      {
        visibleIf: "{section} contains 'Section 16 - Advertising' ",
          title: "Advertising",
          questions: [
            {
                type: 'dropdown',
                name: 'frequency09',
                title: 'Frequency',
                isRequired: true,
                choices: [
                    'Daily',
                    'Bi-weekly',
                    'Weekly',
                    'Bi monthly',
                    'Monthly',
                    'Less than monthly'
                ]
            },
            {
                type: 'dropdown',
                name: 'tv09',
                title: 'For TV',
                isRequired: true,
                choices: [
                    'Sign language',
                    'No sign language'
                ] 
            },
            {
                "name": "include_date05",
                "type": "datepicker",
                "inputType": "date",
                "title": "Your favorite date:",
                "dateFormat": "mm/dd/yy",
                "isRequired": true
            }
          ]
      },
  ]
};