use openpresentations;

INSERT INTO presentations(name,share,owner)
VALUES ('test','public', 2);

INSERT INTO slides(nr,title,content,template,presentation_id) 
VALUES (1,'Title Slide','Thomas Vandermarliere','title', 2);

INSERT INTO slides(nr,title,content,template,presentation_id) 
VALUES (2,'Content Slide','This is random content','content', 2);

INSERT INTO slides(nr,title,image,template,presentation_id) 
VALUES (3,'Image Slide','test.jpg','image', 2);