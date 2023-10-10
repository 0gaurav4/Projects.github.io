
import pyttsx3   #pip install pyttsx3
import requests    #pip install requests
from requests.api import request   
import wikipedia   #pip install wikipedia
import speech_recognition as sr   #pip install SpeechRecognition
import datetime
import webbrowser
import os 
import shutil
#import random
import cv2   #pip install opencv-python
import smtplib
from requests import get
import pywhatkit  #pip install pywhatkit  #login whatsapp in pc
import sys
import time
import pyjokes   #pip install pyjokes
import pyautogui   #pip install PyAutoGUI
import instaloader
import PyPDF2  #pip install PyPDF2
from bs4 import BeautifulSoup   #pip install bs4   #pip install beautifulsoup4
# from pywikihow import search_wikihow   #pip install pywikihow 
import psutil   #pip install psutil
import speedtest    #pip install speedtest-cli

#voices
engine = pyttsx3.init('sapi5')
voices = engine.getProperty('voices')
#print(voices[0].id)
engine.setProperty('voice', voices[0].id)
engine.setProperty('rate', 180)

#text to speech
def speak(audio):
    engine.say(audio)
    engine.runAndWait()

#it takes microphone input from the user and returns string output
def takeCommand():
   
    r= sr.Recognizer()
    with sr.Microphone() as source:
        print("Listening...")
        r.pause_threshold = 1
        audio = r.listen(source)

    try:
        print("Recognizing...")
        query = r.recognize_google(audio, language='en-in')
        print(f"User said: {query}\n")
    
    except Exception as e:
        # print(e)
        print("Pardon me! Unable to Recognize your voice. Try saying --help")
        speak("Pardon me! Unable to Recognize your voice. Try saying --help")
        return "None"
    return query

#to wish
def wishMe():
    hour = int(datetime.datetime.now().hour)
    tt = time.strftime("%I:%M %p")

    if hour>=0 and hour<12:
        print(f"Good Morning, its {tt}")
        speak(f"Good Morning, its {tt}")

    elif hour>=12 and hour<18:
        print(f"Good Afternoon, its {tt}")
        speak(f"Good Afternoon, its {tt}")

    elif hour>=18 and hour<22:
        print(f"Good Evening, its {tt}")
        speak(f"Good Evening, its {tt}")

    else:
        print(f"Good Night, its {tt}")
        speak(f"Good Night, its {tt}")
    
    print(f"Hi, Your 'Desktop Voice Assistant' here. There's a lot I can help with. Here are few popular actions...\n Try saying \n - Good morning \n - About Project  \n - What is your name \n - Can you do Some Calculations")
    speak(f"Hi, Your 'Desktop Voice Assistant' here. There's a lot I can help with. Here are few popular actions...\n Try saying \n Good morning \n or  About Project \n or What is your name \n or Can you do Some Calculations")

def username():
    print("What should i call you?")
    speak("What should i call you?")
    uname = takeCommand()
    columns = shutil.get_terminal_size().columns
    print("".center(columns))
    print("Welcome ", uname.center(columns))
    speak("Welcome ")
    speak(uname)
    print("".center(columns))
    print("Can i read top 3 Today's News?")
    speak("Can i read top 3 Today's News?")

#send email
def sendEmail(to, content):
    server = smtplib.SMTP('smtp.gmail.com', 587)
    server.ehlo()
    server.starttls()
    # Enable low security in gmail
    server.login('gaurav.tiwaribca2019@bbdu.ac.in', 'your-password')
    server.sendmail('gaurav.tiwaribca2019@bbdu.ac.in', to, content)
    server.close()

#news    
def news():
    main_url = 'https://newsapi.org/v2/top-headlines?sources=techcrunch&apiKey=09e8dca64eae4a6597194058d632d9b0'
    main_page = requests.get(main_url).json()
    # print(main_page)
    articles = main_page["articles"]
    # print(articles)
    head =[]
    day=["first","second","third"]
    for ar in articles:
        head.append(ar["title"])
    for i in range (len(day)):
        print(f"today's {day[i]} news is: {head[i]}")
        speak(f"today's {day[i]} news is: {head[i]}")
        print("Here the top 3 news i read it for you. Try Saying... Ok Google")
        speak("Here the top 3 news i read it for you. Try Saying... Ok Google")

#read book
def pdf_reader():
    while True:
               print("Would you like to Continue or stop?")
               speak("Would you like to Continue or stop?")
               action = takeCommand()
               try:
                   if 'exit' in action or 'close' in action or 'no' in action or 'stop' in action:
                       print("okay, i am closed.\n")
                       speak("okay, i am closed.")
                       break
                   elif 'continue' in action: 
                       print("I am opening a book of Anne Frank")   
                       speak("I am opening a book of Anne Frank")
                       book = open('C:\\Users\\gaura\\OneDrive\\Desktop\\0gaurav\\0\\exe\\jarvis\\TheDiaryofaYoungGirl.pdf','rb')  #use your pdf location
                       pdfReader = PyPDF2.PdfFileReader(book)
                       pages = pdfReader.numPages
                       print(f"Total number of pages in this book {pages}\n")
                       speak(f"Total number of pages in this book {pages}")
                       print("Please enter the page number i have to read ... I think first three pages have intro only.")
                       speak("Please enter the page number i have to read ... I think first three pages have intro only.")
                       pg = int(input("Please enter the page number:"))
                       page = pdfReader.getPage(pg)
                       text = page.extractText()
                       print("\n")
                       print(text)
                       print("\n")
                       speak(text)
               except Exception as e:
                   print("Sorry, i am not able to find this.")
                   speak("Sorry, i am not able to find this.")
        
def bit_to_mb(bit):
  #B  = 8 # One Byte is 8 bits
  KB = 1024 # One Kilobyte is 1024 bytes
  MB = KB * 1024 # One MB is 1024 KB
  return int(bit/MB)
val = bit_to_mb(8 * 1024 * 1024)
print(val)

if __name__ == "__main__":
    #username()
    wishMe() 
    while True:
       query = takeCommand().lower()

# Logic for executing tasks based on query

#search according to wikipedia
       if 'wikipedia' in query:
           print('\nSearching To Wikipedia...\n')
           speak('Searching To Wikipedia...')
           query = query.replace("wikipedia", "")
           results = wikipedia.summary(query, sentences=2)
           print("\nAccording to wikipedia\n")
           speak("According to wikipedia")
           print(results)
           speak(results)
           print("Wanna take a Screenshot? Try saying... Take a screenshot.")
           speak("Wanna take a Screenshot? Try saying... Take a screenshot.")

#what is your name
       elif "what's your name" in query or "What is your name" in query:
           print("What would you like to call me? ")
           speak("What would you like to call me? ")
           tempname = takeCommand()
           print("Thanks for naming me now i will remember my name. Try Saying --Tell me your name")
           speak("Thanks for naming me now i will remember my name. Try Saying --Tell me your name")

#tell me your name
       elif "your new name" in query or 'tell me your name' in query:
           assname = "Jarvis"
           assname = tempname
           #tempname = assname
           print(f"My friends call me {assname}")
           speak(f"My friends call me {assname}")
           username()

#open youtube
       elif 'open youtube' in query:
           speak("Here you go to Youtube\n")
           webbrowser.open("youtube.com")
           time.sleep(10)

#open google
       elif 'open google' in query:
           speak("Here you go to Google\n")
           webbrowser.open("google.com")
           time.sleep(10)

#open stackoverflow
       elif 'open stackoverflow' in query:
           speak("Here you go to Stack Over flow.Happy coding")
           webbrowser.open("stackoverflow.com")
           time.sleep(10)

#ok google       
       elif 'ok google' in query or 'google' in query or 'OK Google' in query:
           speak('What should i search on Google...')
           cm =takeCommand().lower()
           speak("Here you go to Google\n")
           webbrowser.open(f"https://www.google.co.in/search?q={cm}&sxsrf=AOaemvIzUgQknzeXrGKHBntUxPzyKPI3xQ%3A1634490340803&source=hp&ei=5FdsYbDILcOB-QaU5YCwAw&iflsig=ALs-wAMAAAAAYWxl9HZVjrAxwKov-34XCteU914Lvp9l&ved=0ahUKEwiwypiB99HzAhXDQN4KHZQyADYQ4dUDCAg&oq=se&gs_lcp=Cgdnd3Mtd2l6EAMyBAgjECcyBAgjECcyBAgjECcyBwgAELEDEEMyBAgAEEMyBQgAEIAEMggIABCABBCxAzIFCC4QgAQyBQgAEIAEMggILhCABBCxAzoHCCMQ6gIQJzoLCAAQgAQQsQMQgwE6CAguELEDEIMBOhEILhCABBCxAxCDARDHARDRA1C-sgJY8LMCYOq8AmgDcAB4AoAB-QmIAcYVkgELMi0xLjEuNi0xLjGYAQCgAQGwAQo&sclient=gws-wiz&uact=5")
           time.sleep(10)
           print("Try Saying... Open Music or Open YouTube")
           speak("Try Saying... Open Music or Open YouTube")
           
#open music       
       elif 'open music' in query:
           music_dir = 'C:\\Users\\gaura\\Music'
           songs = os.listdir(music_dir)
           #rd = random.choice(songs)
           for song in songs:
               if song.endswith('.mp3'):
                   print(songs)
           os.startfile(os.path.join(music_dir, song))

#ip address
       elif 'ip address' in query:
           ip=get('https://api.ipify.org').text
           print(f"your IP address is {ip}")
           speak(f"your IP address is {ip}")
           
#what is the time
       elif 'the time' in query:
           strTime = datetime.datetime.now().strftime("%H:%M:%S")
           print(strTime)
           speak(f"The time is {strTime}\n")

#open code
       elif 'open code' in query:
           codePath ="C:\\Users\\gaura\\AppData\\Local\\Programs\\Microsoft VS Code\\Code.exe"
           os.startfile(codePath)

#open notepad
       elif 'open notepad' in query:
           nPath ="C:\Windows\System32\\notepad.exe"
           os.startfile(nPath)

#open command
       elif 'open command' in query or 'command prompt' in query or 'cmd' in query:
           os.system("start cmd")

#open camera or can you capture this moment
       elif 'open camera' in query or 'can you capture this moment' in query:
           cap = cv2.VideoCapture(0)
           print("Camera is open now, you can exit it by pressing Escape key")
           speak("Camera is open now, you can exit it by pressing Escape key")
           while True:
               ret, img = cap.read()
               cv2.imshow('webcam', img)
               k = cv2.waitKey(50)
               if k==27:
                   break;
           cap.release()
           cv2.destroyAllWindows()
           
#email to someone
       elif 'send a mail' in query or 'email' in query or 'send an email' in query:
            try:
                print("\nWhat should I say?\n")
                speak("What should I say?")
                content = takeCommand()
                print("\nwhome should i send\n")
                speak("whome should i send")
                print("\nEnter email address to send email:")
                to = input()   
                sendEmail(to, content)
                print("\nEmail has been sent !\n")
                speak("Email has been sent !")
            except Exception as e:
                print(e)
                print("I am not able to send this email")
                speak("I am not able to send this email")

#whatsapp
       elif 'send message' in query or 'whatsapp' in query:
           print("\nwhom should i send\n")
           speak("whom should i send")
           print("\nEnter mobile number below to send whatsapp message:")
           speak("\nEnter mobile number below to send whatsapp message:")
           mob = input()
           print("\nWhat message you want to send?\n")
           speak("What  message you want to send?")
           msg = takeCommand()
           pywhatkit.sendwhatmsg_instantly(f"+91{mob}", f"{msg}")
           time.sleep(10)

#what you do for me or suggestions
       elif 'what you do for me' in query or 'help' in query or 'suggestion' in query or 'give me some suggestion' in query:
           print("Just Asking me... \n\n (1) Ok Google \t\t (2) Something according to wikipedia \t\t (3) Open and close apps like(command prompt, notepad, vscode, music, calculator) \n\n (4) Where we are \t (5) Tell me news \t\t (6) Switch window  \t\t (7) Open Youtube \t\t (8) Tell me the time \n\n (9) IP adress \t\t (10) Battery  \t\t\t (11) Screenshot \t\t (12) Tell me a joke \t\t (13) Instagram profile  \n\n (14) Social media \t (15) Internet speed \t\t (16) How to do \t\t (17) Open camera \t\t (18) Send a whatsapp message  \n\n (19) Play game  \t (20) Send mail  \t\t (21) Wait \t\t\t (22) Restart \t\t\t (23) Shutdown \t (24) Exit")
           speak("Just Asking me... \n\n Ok Google \tor Something according to wikipedia \tor Open and close appslike(command prompt, notepad, vscode, music, calculator)  \n\nor Where we are \tor tell me news \tor switch window   \tor Open Youtube \tor Tell me the time  \n\nor IP adress \tor Battery \tor Screenshot \tor tell me a joke \tor Instagram profile  \n\nor Social media \tor Internet speed \tor How to do \tor Open camera \tor Send a whatsapp message  \n\nor Play game \tor Send mail \tor Wait \tor Restart \tor Shutdown \tor Exit")
           time.sleep(10)


#to close apps
#close notepad
       elif 'close notepad' in query:
           speak("okay, closing the notepad")
           os.system("taskkill /f /im notepad.exe")

#close code
       elif 'close code' in query:
           speak("okay, closing the VScode")
           os.system("taskkill /f /im Code.exe")

#i am bored or do something interesting
       elif 'i am bored' in query or 'bored' in query or 'do something interesting' in query:
           print(f"I am here for you... \n Try Saying... \t (1) Make me laugh \t (2) Play game \t (3) Play more games \t (4) open Instagram profile")
           speak(f"I am here for you... \n Try Saying... \t Make me laugh or \t Play game or \t Play more games or \t Open Instagram profile")

#make me laugh
       elif 'tell me a joke' in query or 'make me laugh' in query:
           joke = pyjokes.get_joke()
           print(joke)
           speak(joke)

#play game
       elif 'play game' in query:
            speak("Here you go to play\n")
            webbrowser.open("https://googlefeud.games/")
            time.sleep(10)

#play another game or play more games
       elif 'play another game' in query or 'play more games' in query:
            speak("Here you go to play\n")
            webbrowser.open("https://www.googlesnake.com/")
            time.sleep(10)

#system
#shutdown the system     
       elif 'shutdown the system' in query:
           os.system("shutdown /s /t 5")

#restart the system
       elif 'restart the system' in query:
           os.system("shutdown /r /t 5")   

#switch window
       elif 'switch window' in query:
           pyautogui.keyDown("alt")
           pyautogui.press("tab")
           time.sleep(1)
           pyautogui.keyUp("alt")

#news
       elif 'tell me news' in query or 'news' in query:
           speak("please wait, fetching the latest news...")
           news()

#open calculator
       elif 'open calculator' in query or 'can you do some calculations' in query:
           speak("Here you go to claculator.")
           webbrowser.open("https://www.bing.com/search?q=calculator&cvid=010b4069d00c472ab7748a4ce606c169&aqs=edge..69i57j69i59l2j69i60l3j69i65.5216j0j1&pglt=515&FORM=ANSPA1&PC=LCTS")
           time.sleep(10)
           print("Can i check internet speed? Or Whatsapp message?\n")
           speak("Can i check internet speed? Or Whatsapp message?\n")

#where we are
       elif 'where i am' in query or 'where we are' in query:
           print("wait, let me check")
           speak("wait, let me check")
           try:
               ipAdd = requests.get('https://api.ipify.org').text
               print(ipAdd)
               url = 'https://get.geojs.io/v1/ip/geo/'+ipAdd+'.json'
               geo_requests = requests.get(url)
               geo_data = geo_requests.json()
               #print(geo_data)
               city = geo_data['city']
               #state=geo_data['state']
               country = geo_data['country']
               print(f"I am not sure, but i think we are in {city} city of {country} country")
               speak(f"I am not sure, but i think we are in {city} city of {country} country")
           except Exception as f:
               print("sorry, due to network issue i am not able to find where we are.")
               speak("sorry, due to network issue i am not able to find where we are.")
               pass

#about project
       elif 'about your software' in query or 'about your project' in query or 'project' in query: 
            print("This is a Desktop Voice Assistant program written in Python 3.\n The project is too easy to handle just run it and you will be definitly happy with it. Try saying... Do something Interesting or \t Capture this moment")
            speak("This is a Desktop Voice Assistant program written in Python 3.\n The project is too easy to handle just run it and you will be definitly happy with it. Try saying... Do something Interesting or \t Capture this moment")

#to take screenshot
       elif 'screenshot' in query or 'take a screenshot' in query:
           speak("Please tell me the name for this screenshot file")
           name = takeCommand().lower()
           print("Please hold the screen for few seconds, i am taking screenshot...")
           speak("Please hold the screen for few seconds, i am taking screenshot...")
           time.sleep(3)
           img= pyautogui.screenshot()
           img.save(f"{name}.png")
           print("i am done, the screenshot is saved in the main folder.")
           speak("i am done, the screenshot is saved in the main folder.")

#to check a instagram profile
       elif 'instagram profile' in query or 'profile on instagram' in query:
           print("Please enter the username correctly.")
           speak("Please enter the username correctly.")
           name = input("Enter username here:")
           webbrowser.open(f"www.instagram.com/{name}")
           speak(f"Here is the profile of the user {name}")
           time.sleep(5)
           print("Would you like to download profile picture of this account.")
           speak("Would you like to download profile picture of this account.")
           condition = takeCommand().lower()
           if "yes" in condition:
               mod =instaloader.Instaloader() #pip install instadownloader
               mod.download_profile(name, profile_pic_only=True)
               print("i am done, the profile picture is saved in the main folder.")
               speak("i am done, the profile picture is saved in the main folder.")
               pass

#to read pdf
       elif 'read pdf' in query or 'read the book' in query or 'read book'  in query or 'read a book for me' in query or 'read the book for me' in query or 'read a book' in query:
           pdf_reader()

#hello
       elif 'hello' in query or 'hi' in query:
           print("Hello, How are you?")
           speak("Hello, How are you?")

#how are you
       elif 'how are you' in query:
           print("I am fine, glad you me that, what about you?")
           speak("I am fine, glad you me that, what about you?")

#reason for you
       elif 'reason for you' in query:
            speak("I was created as a Minor project by Gaurav Tiwari, BCA31")
 
#fine
       elif 'fine' in query or 'i am good' in query:
           print("That's great to hear from you. Try saying... What about my day?")
           speak("That's great to hear from you. Try saying... What about my day?")

#not fine
       elif 'not fine' in query or 'i am not good' in query:
           print("How can i help you. Try saying... help")
           speak("How can i help you. Try saying... help")

#thank you
       elif 'Thank you' in query or 'Thanks' in query:
           print("It's my pleasure.")
           speak("It's my pleasure.")

#pleasure
       elif 'Its my pleasure' in query or 'pleasure' in query:
           print("That's great to hear from you. Try saying... Where we are?")
           speak("That's great to hear from you. Try saying... Where we are?")
       
#what about my day or temperature or tell me about my day
       elif 'temperature' in query or 'tell me about my day' in query or 'about my day' in query or 'what about my day' in query:
           search = 'temperature now'
           url = f"https://www.google.com/search?q={search}"
           r = requests.get(url)
           data = BeautifulSoup(r.text,"html.parser")
           temp = data.find("div",class_="BNeawe").text
           print(f"current {search} is {temp}")
           speak(f"current {search} is {temp}")
           print("Try saying... Suggestions")
           speak("Try saying... Suggestions")

# #how to do
#        elif 'activate how to do' in query or 'how to do' in query:
#            print("How to do mode is activated.")
#            speak("How to do mode is activated.")
#            while True:
#                print("Please tell me what you want to know?")
#                speak("Please tell me what you want to know?")
#                how = takeCommand()
#                try:
#                    if 'exit' in how or 'close' in how:
#                        print("okay, how to do is closed. Try saying... Something search according to wikipedia")
#                        speak("okay, how to do is closed. Try saying... Something search according to wikipedia")
#                        break
#                    else:
#                        max_results = 1
#                        how_to = search_wikihow(how, max_results)
#                        assert len(how_to) == 1
#                        how_to[0].print()
#                        print(how_to[0].summary)
#                        speak(how_to[0].summary)
#                except Exception as e:
#                    print("Sorry, i am not able to find this.")
#                    speak("Sorry, i am not able to find this.")

#socialmedia
       elif 'social media' in query or 'socialmedia' in query:
           while True:
               print("Please tell me Which account i will open for you? \n Facebook \t Insta \t Twitter or \t Linkedin ")
               speak("Please tell me Which account i will open for you? \n Facebook \t Insta \t Twitter or \t Linkedin ")
               howto = takeCommand().lower
               try:
                   if 'exit' in howto or 'close' in howto or 'no' in howto or 'stop' in howto:
                       print("okay, social media is closed. Try Saying... How to do Something.")
                       speak("okay, social media is closed. Try Saying... How to do Something.")
                       break
                   elif 'facebook' in howto or 'face book' in howto:
                       speak("Here you go to Facebook\n")
                       webbrowser.open("facebook.com")
                       time.sleep(10)
                   elif 'instagram' in howto or 'insta' in howto:
                       speak("Here you go to Instagram\n")
                       webbrowser.open("instagram.com")
                       time.sleep(10)
                   elif 'twitter' in howto or 'tweet' in howto:
                       speak("Here you go to Twitter\n")
                       webbrowser.open("twitter.com")
                       time.sleep(10)  
                   elif 'linkedin' in howto or 'linked in' in howto:
                       speak("Here you go to Linkedin\n")
                       webbrowser.open("linkedin.com")
                       time.sleep(10) 
               except Exception as e:
                   print("Sorry, i am not able to find this.")
                   speak("Sorry, i am not able to find this.")

#battery
       elif 'how much power left' in query or 'how much power we have' in query or 'battery' in query:
           battery = psutil.sensors_battery()
           percentage = battery.percent
           print(f"Our System have {percentage} percent battery")
           speak(f"Our System have {percentage} percent battery")
           if percentage>=75:
               print("we have enough power to continue our work! ...Try saying... Social media")
               speak("we have enough power to continue our work! ...Try saying... Social media")
           if percentage>=40 and percentage<=75:
               print("we should connect our system to charging point to charge our battery!")
               speak("we should connect our system to charging point to charge our battery!")
           if percentage>=15 and percentage<=30:
               print("we don't have enough power to work, please connect to charging!")
               speak("we don't have enough power to work, please connect to charging!")
           elif percentage<=15:
               print("we have very low power, please connect to charging the system will shutdown very soon. Can I shutdown the pc!")
               speak("we have very low power, please connect to charging the system will shutdown very soon. Can I shutdown the pc!")

#internet speed
       elif 'internet speed' in query:
           print("Please waiting...")
           speak("Please waiting...")
           st = speedtest.Speedtest()
           dl = bit_to_mb(st.download())
           up = bit_to_mb(st.upload())
           print(f"We have {dl} mb per second downloading speed and {up} mb per second uploading speed.  \t Can i send an email?")
           speak(f"We have {dl} mb per second downloading speed and {up} mb per second uploading speed.  \t Can i send an email?")

#who i am 
       elif "who i am" in query:
           print("If you talk then definitely your human.")
           speak("If you talk then definitely your human.")
           username()

#why you came or created 
       elif "why you came to world" in query or 'why you created' in query:
           speak("Thanks to Gaurav. further It's a secret")

#tell something
       elif 'assistant tell something' in query or 'tell something' in query or 'can you tell something' in query:
           print("Sure, Try saying... What you do for me?")
           print("Sure, Try saying... What you do for me?")

#good morning
       elif 'good morning' in query:
           print("Good morning, have a good day. How are you?")
           speak("Good morning, have a good day. How are you?")

#good afternoon
       elif 'good afternoon' in query:
           print("Good afternoon, Can i check... How much power we have?")
           speak("Good afternoon, Can i check... How much power we have?")

#good evening
       elif 'good evening' in query:
           print("Good evening, Wanna Search someting... How to do?")
           speak("Good evening, Wanna Search someting... How to do?")

#good night
       elif 'good night' in query:
           print("Good night sleep well, \t Can i will also go to sleep? \t Or Read a book for you? \t or Shut Down the system!")
           speak("Good night sleep well, \t Can i will also go to sleep? \t Or Read a book for you? \t or Shut Down the system!")

#pause for a seconds
       elif "pause" in query or "pause a second" in query or 'wait a second' in query or 'one second' in query or 'wait' in query:
           print("okay pause a second.")
           speak("okay pause a second.")
           time.sleep(60)
           print("Given time is over now i am activated again.")
           speak("Given time is over now i am activated again.")

#stop for seconds
       elif "don't listen" in query or "stop listening" in query or 'shut up' in query:
           print("for how much seconds you want to stop Assistant from listening commands")
           speak("for how much seconds you want to stop Assistant from listening commands")
           a = int(input())
           time.sleep(a)
           print("Given time is over now i am activated again.")
           speak("Given time is over now i am activated again.")

#to exit
       elif 'exit' in query or 'leave now' in query or 'sleep' in query or 'stop' in query or 'keep queit' in query:
           print("Thanks For using me, have a good day!")
           speak("Thanks For using me, have a good day!")
           sys.exit()

       #speak("Do you have any other work!...")
               
