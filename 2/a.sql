

LOAD DATA
LOCAL INFILE "C:/data/follows.txt"
REPLACE INTO TABLE Follows
FIELDS TERMINATED BY '|'
(followerId, followeeId);

LOAD DATA
LOCAL INFILE "C:/data/data/fav.txt"
REPLACE INTO TABLE Favorite
FIELDS TERMINATED BY '|'
(fTime, userId, tweetId);

LOAD DATA
LOCAL INFILE "data/rt.txt"
REPLACE INTO TABLE Retweet
FIELDS TERMINATED BY '|'
(rTime, userId, tweetId);