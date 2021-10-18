import pyttsx3  #pip install pyttsx3
import wikipedia  #pip install wikipedia
import speech_recognition as sr   #pip install SpeechRecognition
import datetime
import webbrowser
import os
import random
import cv2  #pip install opencv-python
import smtplib
from requests import get
import pywhatkit
import sys


engine = pyttsx3.init('sapi5')
voices = engine.getProperty('voices')
#print(voices[0].id)
engine.setProperty('voice', voices[0].id)

#text to speech
def speak(audio):
    engine.say(audio)
    engine.runAndWait()

#to wish
def wishMe():
    hour = int(datetime.datetime.now().hour)
    if hour>=0 and hour<12:
        speak("Good Morning!")
        print("Good Morning!")

    elif hour>=12 and hour<18:
        speak("Good Afternoon!")
        print("Good Afternoon!")

    elif hour>=18 and hour<22:
        speak("Good Evening!")
        print("Good Evening!")

    else:
        speak("Good Night!")
        print("Good Night!")

    print("I am your 'desktop voice assistant'. Please tell me how can i help you...")
    speak("I am your 'desktop voice assistant'. Please tell me how can i help you...")

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

        print("Say that again please...")
        speak("Say that again please...")
        return "None"
    return query

#send email
def sendEmail(to, content):
    server = smtplib.SMTP('smtp.gmail.com', 587)
    server.ehlo()
    server.starttls()
    server.login('gaurav.tiwaribca2019@bbdu.ac.in' 'your-password')
    server.sendmail('gaurav.tiwaribca2019@bbdu.ac.in', to, content)
    server.close()
    


if __name__ == "__main__":
    wishMe() 
    while True:
       query = takeCommand().lower()


       # Logic for executing tasks based on query
       if 'wikipedia' in query:
           speak('Searching To Wikipedia...')
           query = query.replace("wikipedia", "")
           results = wikipedia.summary(query, sentences=2)
           speak("According to wikipedia")
           print(results)
           speak(results)

       elif 'open youtube' in query:
           webbrowser.open("youtube.com")

       elif 'open google' in query:
           webbrowser.open("google.com")

       elif 'open stackoverflow' in query:
           webbrowser.open("stackoverflow.com")
        
       elif 'google' in query:
           speak('What should i search on Google...')
           cm =takeCommand().lower()
           webbrowser.open(f"https://www.google.co.in/search?q={cm}&sxsrf=AOaemvIzUgQknzeXrGKHBntUxPzyKPI3xQ%3A1634490340803&source=hp&ei=5FdsYbDILcOB-QaU5YCwAw&iflsig=ALs-wAMAAAAAYWxl9HZVjrAxwKov-34XCteU914Lvp9l&ved=0ahUKEwiwypiB99HzAhXDQN4KHZQyADYQ4dUDCAg&oq=se&gs_lcp=Cgdnd3Mtd2l6EAMyBAgjECcyBAgjECcyBAgjECcyBwgAELEDEEMyBAgAEEMyBQgAEIAEMggIABCABBCxAzIFCC4QgAQyBQgAEIAEMggILhCABBCxAzoHCCMQ6gIQJzoLCAAQgAQQsQMQgwE6CAguELEDEIMBOhEILhCABBCxAxCDARDHARDRA1C-sgJY8LMCYOq8AmgDcAB4AoAB-QmIAcYVkgELMi0xLjEuNi0xLjGYAQCgAQGwAQo&sclient=gws-wiz&uact=5")
           
        
       elif 'open music' in query:
           music_dir = 'C:\\Users\\gaura\\Music'
           songs = os.listdir(music_dir)
           #rd = random.choice(songs)
           for song in songs:
               if song.endswith('.mp3'):
                   print(songs)
           os.startfile(os.path.join(music_dir, song))


       elif 'ip address' in query:
           ip=get('https://api.ipify.org').text
           print(f"your IP address is {ip}")
           speak(f"your IP address is {ip}")
           

       elif 'the time' in query:
           strTime = datetime.datetime.now().strftime("%H:%M:%S")
           print(strTime)
           speak(f"The time is {strTime}\n")

       elif 'open code' in query:
           codePath ="C:\\Users\\gaura\\AppData\\Local\\Programs\\Microsoft VS Code\\Code.exe"
           os.startfile(codePath)

       elif 'open notepad' in query:
           nPath ="C:\Windows\System32\\notepad.exe"
           os.startfile(nPath)

       elif 'open command' in query:
           os.system("start cmd")

       elif 'open camera' in query:
           cap = cv2.VideoCapture(0)
           while True:
               ret, img = cap.read()
               cv2.imshow('webcam', img)
               k = cv2.waitkey(50)
               if k==27:
                   break;
           cap.release()
           cv2.destroyAllWindows()

       elif 'email to Gaurav' in query:
           try:
               speak("What should i say?")
               content = takeCommand().lower()
               to = "gaurav.tiwaribca2019@bbdu.ac.in"
               sendEmail(to, content)
               speak("Email has been sent!")
           except Exception as e:
               print(e)
               speak("Sorry for inconvinience. I am unable to send this email")

       elif 'send message' in query:
           pywhatkit.sendwhatmsg("+9170884817", "this is testing protocol",2,25)

       #to exit
       elif 'no thanks' in query:
           speak("Thanks For using me, and have a good day!")
           sys.exit()

       speak("Do you have any other work!...")
               


