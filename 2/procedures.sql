DELIMITER |
CREATE PROCEDURE topicSearch (IN topic INT)
BEGIN
SELECT *
FROM Tweet
INNER JOIN RelatedTo
ON Tweet.tweetId = RelatedTo.tweetId
WHERE topicId = topic;
END;|
DELIMITER ;

-- DROP PROCEDURE topicSearch;

DELIMITER |
CREATE PROCEDURE userTopicSearch (IN topic INT)
BEGIN
SELECT *
FROM User
INNER JOIN CertifiedIn
ON User.userId = CertifiedIn.userId
WHERE topicId = topic;
END;|
DELIMITER ;


DELIMITER |
CREATE PROCEDURE userDeets (IN id INT)
BEGIN
SELECT *
FROM User
LEFT OUTER JOIN
((SELECT COUNT(*) AS Followers, followeeId
FROM Follows
GROUP BY followeeId)
AS followerCount)
ON followerCount.followeeId = User.userId
LEFT OUTER JOIN
((SELECT COUNT(*) AS Follows, followerId
FROM Follows
GROUP BY followerId)
AS followeeCount)
ON followeeCount.followerId = User.userId
LEFT OUTER JOIN
((SELECT COUNT(*) AS writtenCount, userId
FROM WrittenBy
GROUP BY userId)
AS wbyCount)
ON wbyCount.userId = User.userId
WHERE User.userId = 1;
END;|
DELIMITER ;
-- DROP PROCEDURE userDeets;

DELIMITER |
CREATE PROCEDURE certSearch (IN id INT)
BEGIN
SELECT *
FROM User
INNER JOIN CertifiedIn
ON User.userId = CertifiedIn.userId
WHERE User.userId = id;
END;|
DELIMITER ;
-- DROP PROCEDURE certSearch;

DELIMITER |
CREATE PROCEDURE favList (IN id INT)
BEGIN
SELECT userId
FROM Favorite
WHERE tweetId =id;
END;|
DELIMITER ;
-- DROP PROCEDURE favList;

DELIMITER |
CREATE PROCEDURE rtList (IN id INT)
BEGIN
SELECT userId
FROM Retweet
WHERE tweetId =id;
END;|
DELIMITER ;
-- DROP PROCEDURE rtList;

DELIMITER |
CREATE PROCEDURE followerList (IN id INT)
BEGIN
SELECT followerId, userName
FROM Follows
INNER JOIN User
ON Follows.followerId = User.userId
WHERE followeeId = id;
END;|
DELIMITER ;
-- DROP PROCEDURE followerList;

DELIMITER |
CREATE PROCEDURE wbyList (IN id INT)
BEGIN
SELECT content, tweetId, userId
FROM Tweet
NATURAL JOIN WrittenBy
WHERE WrittenBy.userId = id;
END;|
DELIMITER ;
-- DROP PROCEDURE wbyList;

DELIMITER |
CREATE PROCEDURE followeeList (IN id INT)
BEGIN
SELECT followeeId, userName
FROM Follows
INNER JOIN User
ON Follows.followeeId = User.userId
WHERE followerId = id;
END;|
DELIMITER ;
-- DROP PROCEDURE followeeList;

-- find every tweet between a given date and today

DELIMITER |
CREATE PROCEDURE dateSearch (IN x DATE)
BEGIN
SELECT *
FROM Tweet
WHERE pubTime > x
ORDER BY pubTime;
END;|
DELIMITER ;
-- DROP PROCEDURE dateSearch; 

DELIMITER |
CREATE PROCEDURE tweetDeets (IN id INT)
BEGIN
SELECT pubTime, Tweet.tweetId, content, Favs, RTs, userId
FROM Tweet
LEFT OUTER JOIN
((SELECT COUNT(*) AS Favs, tweetId
FROM Favorite
GROUP BY tweetId)
AS favCount)
ON favCount.tweetId = Tweet.tweetId
LEFT OUTER JOIN
((SELECT COUNT(*) AS RTs, tweetId
FROM Retweet
GROUP BY tweetId)
AS rtCount)
ON rtCount.tweetId = Tweet.tweetId
LEFT OUTER JOIN
((SELECT userId, tweetId
FROM WrittenBy)
AS wBy)
ON wBy.tweetId = Tweet.tweetId
WHERE Tweet.tweetId = id;
END;|
DELIMITER ;
-- DROP PROCEDURE tweetDeets; 

-- insert a new tweet
DELIMITER |
CREATE PROCEDURE newTweet (IN id INT, IN content VARCHAR(140))
BEGIN
INSERT INTO Tweet (pubTime, tweetId, content)
VALUES (CURDATE(), id, content);
END;|
DELIMITER ;
-- DROP PROCEDURE newTweet; 

-- show all the tweets that would be in a user's timeline
DELIMITER |
CREATE PROCEDURE timeline (IN id INT)
BEGIN
SELECT content, userName, pubTime, userId
FROM User 
NATURAL JOIN
(SELECT content, userId, pubTime
FROM Tweet
NATURAL JOIN 
(SELECT *
FROM WrittenBy
JOIN
(SELECT followeeId
FROM Follows 
WHERE followerId = id) AS TL2
ON userId = followeeId) AS TL) AS TL3
ORDER BY pubTime;
END;|
DELIMITER ;
-- DROP PROCEDURE timeline; 
