

LOAD DATA
LOCAL INFILE "C:/data/interested.txt"
REPLACE INTO TABLE InterestedIn
FIELDS TERMINATED BY '|'
(userId, topicId);

LOAD DATA
LOCAL INFILE "C:/data/certified.txt"
REPLACE INTO TABLE CertifiedIn
FIELDS TERMINATED BY '|'
(userId, topicId);


LOAD DATA
LOCAL INFILE "C:/data/related.txt"
REPLACE INTO TABLE RelatedTo
FIELDS TERMINATED BY '|'
(tweetId, topicId);