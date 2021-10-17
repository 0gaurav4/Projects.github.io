import pyttsx3
import wikipedia
import speech_recognition as sr
import datetime
import webbrowser
import os
import smtplib


engine = pyttsx3.init('sapi5')
voices = engine.getProperty('voices')
#print(voices[0].id)
engine.setProperty('voice', voices[0].id)

def speak(audio):
    engine.say(audio)
    engine.runAndWait()

def wishMe():
    hour = int(datetime.datetime.now().hour)
    if hour>=0 and hour<12:
        speak("Good Morning!")

    elif hour>=12 and hour<18:
        speak("Good Afternoon!")

    elif hour>=18 and hour<22:
        speak("Good Evening!")

    else:
        speak("Good Night!")

    speak("I am your voice assistant. Please tell me how may i help you")

def takeCommand():
    #it takes microphone input from the usser and returns string output

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

def sendEmail(to, content):
    server = smtplib.SMTP('smtp.gmail.com', 587)
    server.ehlo()
    server.starttls()
    server.login('gaurav.tiwaribca2019@bbdu.ac.in' '#shreya$honeY1*')
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
           webbrowser.open(f"{cm}")
           
        
       elif 'open music' in query:
           music_dir = 'C:\\Users\\gaura\\Music'
           songs = os.listdir(music_dir)
           print(songs)
           os.startfile(os.path.join(music_dir, songs[0]))

       elif 'the time' in query:
           strTime = datetime.datetime.now().strftime("%H:%M:%S")
           print(strTime)
           speak(f"The time is {strTime}\n")

       elif 'open code' in query:
           codePath ="C:\\Users\\gaura\\AppData\\Local\\Programs\\Microsoft VS Code\\Code.exe"
           os.startfile(codePath)

       elif 'email to Gaurav' in query:
           try:
               speak("What should i say?")
               content = takeCommand()
               to = "gaurav.tiwaribca2019@bbdu.ac.in"
               sendEmail(to, content)
               speak("Email has been sent!")
           except Exception as e:
               print(e)
               speak("Sorry for inconvinience. I am unable to send this email")

       elif 'exit' in query:
           exit()
               


