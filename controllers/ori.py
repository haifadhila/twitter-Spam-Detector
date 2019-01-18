import tweepy
import re
import json
# from flask import Flask, request, make_response
global count
global listTweet
listTweet = []
count = 0;

# KMP
def kmp(text, pattern):
    n = len(text)
    m = len(pattern)

    fail = computeFail(pattern)

    i = 0
    j = 0

    while (i < n):
        if (pattern[j] == text[i]):
            # If
            if (j == m - 1):
                return i - m + 1
            i+= 1
            j+= 1
        elif (j > 0):
            j = fail[j-1]
        else:
            i+= 1

    #If no match
    return -1

def computeFail(pattern):
    fail = [0] * len(pattern)

    m = len(pattern)
    j = 0
    i = 1

    while (i < m):
        if (pattern[j] == pattern[i]):
            fail[i] = j+1
            i+= 1
            j+= 1
        elif ( j > 0 ) :
            j = fail[j-1]
        else:
            fail[i] = 0
            i+= 1

    return fail
# END OF KMP

def bmMatch(text,pattern):
    last = []
    last = buildLast(pattern)
    n = len(text)
    m = len(pattern)
    if (m > n):
        return -1 # no match if pattern is longer than text
    j = m-1
    i = m-1

    while (i <= n-1):
        if (pattern[j] == text[i]):
            if (j == 0):
                return i  # match
            else: # looking-glass technique
                i = i-1
                j = j-1

        else: # character jump technique
            lo = last[ord(text[i])]; #last occ
            i = i + m - min(j, 1+lo);
            j = m - 1;

    return -1 #no match
     #end of bmMatch()

def buildLast(pattern):
    #Return array storing index of last occurrence of each ASCII char in pattern.
    last = [] #ASCII char set
    for i in range(128):
        last.append(-1) #initialize array
    for i in range(len(pattern)):
        last[ord(pattern[i])] = i
    return last
     # end of buildLast()

#END OF BOYER MOORE

# REGEX
def regex(text,pattern):
    listStart = []
    compPattern = re.compile(pattern)
    hasil = re.finditer(pattern, text, re.IGNORECASE)
    if (hasil==[]):
        return -1
    else:
        for i in hasil:
            tupel = (i.start(),i.end())
            listStart.append(tupel)
        return listStart
# END OF REGEX
def dumper(obj):
    try:
        return obj.toJSON()
    except:
        return obj.__dict__
# NYAMBUNG KE TWITTERNYA
def accessTweets(username,p, opt):
    global listTweet
    ACCESS_TOKEN = '98030850-j929Zy1OivGnsQokyOzZ0A6E3XwUx4Yf2MV94t33D'
    ACCESS_SECRET = 'vWLlEodBmJb1mMjKE7KMzsNdHg7gZMHEDCSU1DJKkHUOy'
    CONSUMER_KEY = 	'UEIt0erUfy4lGkjNMubh0j8rM'
    CONSUMER_SECRET = 'fhmuDF8YtvjaoKdhZJ1lwgyEMzb1R91TfZqXH1T7iTZ6INOww5'

    auth = tweepy.OAuthHandler(CONSUMER_KEY, CONSUMER_SECRET)
    auth.set_access_token(ACCESS_TOKEN, ACCESS_SECRET)

    api = tweepy.API(auth)

    user_tweets = api.user_timeline(screen_name=username)

    with open('twitterfeeds.json', 'w') as f:
        for tweet in user_tweets:
            try :
                #tweetbyWords = tweet.split(" ")
                #print("panjang; ", len(tweetbyWords))
                dictTweet = {}
                dictTweet['name'] = tweet.user.name
                dictTweet['username'] = tweet.user.screen_name
                dictTweet['profile_image_url'] = tweet.user.profile_image_url
                dictTweet['text'] = tweet.text
                dictTweet['created_at'] = str(tweet.created_at)
                dictTweet['spam_keyword'] = p
                dictTweet['spam'] = False
                dictTweet['position'] = []
                pos = spamMatch(tweet.text,p,opt)
                if (pos!=-1):
                    k=0
                    # while (k<len)
                    print ("> "+tweet.text)
                    dictTweet['spam'] = True
                    print("---------------------------------------------------------------------------------")
                    dictTweet['position'] = pos
                print(dictTweet['text'])
                listTweet.append(dictTweet)
                #f.write(jsonpickle.encode(twfeed._json, unpicklable=False) + '\n')
            except :
                a = "Error retrieving Tweets"
        json.dump(listTweet,f)
    print("public_tweets:",len(user_tweets))

def spamMatch(text,pattern,pil):
    #posn = []
    global count
    if (pil==2):
        posn = kmp(text.lower(),pattern.lower())

    elif (pil==1):
        posn = bmMatch(text.lower(),pattern.lower())
    else:
        posn = regex(text,r(pattern))

    if (posn == -1 or posn==[]):
        position = -1
    else:
        position = []
        if (pil!=3):
            temp = (posn,len(pattern))
            print("SPAM AT",temp)
            position.append(temp)
            print()
        else:
            print("SPAM AT",posn[0])
            position.append(posn[0])
            posn.pop(0)
            for i in posn:
                print(",", i)
                position.append(i)
            print()
        count = count+1
    return position


# MAIN
f = open("input.txt","r")
f1 = f.readlines()
hehe = []
for x in f1:
    hehe.append(x)
f.close()
accessTweets(hehe[0],hehe[2],int(hehe[1]))
print("Spam count: "+str(count))
