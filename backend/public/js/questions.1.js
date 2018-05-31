var json = {
  title: "Gender in News Monitoring Tool", showProgressBar: "bottom", 
  pages: [
      {
        questions: [
            {
                type: "html",
                name: "homeTemplate",
                html: `
                <div class="sg-content" id="sg-skipnav-target">
                <div class="sg-question-set">		
                
                  <div id="sgE-3565872-1-2-box" class="sg-question sg-type-instruction ">
                    <div class="sg-instructions">
                    <span style="font-size:16px;"><strong>Welcome to the Digital Gender and Media Monitoring Tool</strong></span>	
                    </div>
                  </div>
                
                  <div id="sgE-3565872-1-3-box" class="sg-question sg-type-instruction ">
                    <div class="sg-instructions">
                      This tool is in sections. The first six sections are compulsory, as these provide the basic information on gender gaps in the media. By answering these questions in our 
                      monitoring wherever we are we contribute to a global body of knowledge on gender and the media. Sections 7 to 14 are optional. These delve into a greater level of detail on topics, 
                      and include images (for newspaper monitoring) and advertisements, which is slightly different to news. Pop up boxes give definitions where this is important and relevant.
                    </div>
                  </div>
                
                
                <div id="sgE-3565872-1-4-box" class="sg-question sg-type-instruction ">
                    <div class="sg-instructions">
                      <strong>Menu</strong><br>
                      The survey is split up into the following sections. You will be asked which sections you will be completing at the start of each response.&nbsp;
                    <br>
                    <br>
                    <table border="1" cellpadding="0" cellspacing="0">
                      <tbody><tr><td style="width:132px;"><strong>Section</strong></td>
                        <td style="width:189px;"><strong>&nbsp; Detail</strong></td>
                        <td style="width:207px;"><strong>&nbsp; Status</strong></td>
                      </tr><tr><td style="width:132px;">Section 1</td>
                        <td style="width:189px;">&nbsp; Administrative Information</td>
                        <td style="width:207px;">&nbsp; Compulsory</td>
                      </tr><tr><td style="width:132px;">Section 2</td>
                        <td style="width:189px;">&nbsp; News Sources</td>
                        <td style="width:207px;">&nbsp; Compulsory</td>
                      </tr><tr><td style="width:132px;">Section 3</td>
                        <td style="width:189px;">&nbsp; Source Identity &nbsp;</td>
                        <td style="width:207px;">&nbsp; Compulsory</td>
                      </tr><tr><td style="width:132px;">Section 4</td>
                        <td style="width:189px;">&nbsp; GEM Classification</td>
                        <td style="width:207px;">&nbsp; Compulsory</td>
                      </tr><tr><td style="width:132px;">Section 5 &nbsp;</td>
                        <td style="width:189px;">&nbsp; Reporters</td>
                        <td style="width:207px;">&nbsp; Compulsory</td>
                      </tr><tr><td style="width:132px;">Section 6</td>
                        <td style="width:189px;">&nbsp; Topics in the news</td>
                        <td style="width:207px;">&nbsp; Compulsory</td>
                      </tr><tr><td style="width:132px;">Section 7</td>
                        <td style="width:189px;">&nbsp; Images </td>
                        <td style="width:207px;">&nbsp; Optional</td>
                      </tr><tr><td style="width:132px;">Section 8</td>
                        <td style="width:189px;">&nbsp; Social media</td>
                        <td style="width:207px;">&nbsp; Optional</td>
                      </tr><tr><td style="width:132px;">Section 9</td>
                        <td style="width:189px;">&nbsp; Gender based violence &nbsp;</td>
                        <td style="width:207px;">&nbsp; Optional</td>
                      </tr><tr><td style="width:132px;">Section 10</td>
                        <td style="width:189px;">&nbsp; Elections and political participation </td>
                        <td style="width:207px;">&nbsp; Optional</td>
                      </tr><tr><td style="width:132px;">Section 11</td>
                        <td style="width:189px;">&nbsp; Sexual orientation and gender identity (LGBT)</td>
                        <td style="width:207px;">&nbsp; Optional</td>
                      </tr><tr><td style="width:132px;">Section 12</td>
                        <td style="width:189px;">&nbsp; Peace and conflict</td>
                        <td style="width:207px;">&nbsp; Optional</td>
                      </tr><tr><td style="width:132px;">Section 13</td>
                        <td style="width:189px;">&nbsp; Ethnicity and religion</td>
                        <td style="width:207px;">&nbsp; Optional</td>
                      </tr>
                      <tr><td style="width:132px;">Section 14</td>
                        <td style="width:189px;">&nbsp; Disability</td>
                        <td style="width:207px;">&nbsp; Optional</td>
                      </tr>
                        <tr><td style="width:132px;">Section 15</td>
                        <td style="width:189px;">&nbsp; HIV and AIDS</td>
                        <td style="width:207px;">&nbsp; Optional</td>
                      </tr>
                      <tr><td style="width:132px;">Section 16</td>
                      <td style="width:189px;">&nbsp; Advertising</td>
                      <td style="width:207px;">&nbsp; Optional</td>
                    </tr>
                      </tbody></table>
                      <br>
                      The tool makes use of “skip patterns” i.e. the tool will display (or hide) questions based on previous selections. The navigation bar will give an indication of the different sections of the data capturing tool and the user's current position in the data capturing process. When you finishing capturing data for each story or advertisement submit your input to allow the system to save your entry. Instruction to "Save and Continue Later" are provided below in case you are not able to complete the entry in one go.	
                    </div>
                
                  </div>
                
                  <div id="sgE-3565872-1-6-box" class="sg-question sg-type-instruction ">
                    <div class="sg-instructions">
                    <h2>
                      <span style="font-size:14px;">After completing page 1 (so when on page 2) on the top, you will see a “Save and Continue later” band:</span></h2>
                      <br><span style="font-size:14px;">If you want to go check something and return later, they can click on this and enter your email address:</span><br>
                      <h2><span style="font-size:14px;">Once you have entered your email address twice, whatever you have entered in the application form thus far will be saved and you will receive an email with a link to continue. Kindly note that the email may be sent to your Junk mail box depending on your security settings. Email example:</span></h2>
                      <br><span style="font-size:14px;">You can then click on the link and continue where you left off.</span>	
                    </div>
                  </div> 
                
                </div>
                </div>
                `
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