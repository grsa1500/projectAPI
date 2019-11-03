# Projekt REST-API

I denna uppgift skapades ett REST API som använder GET, POST, PUT och DELETE. I detta API ligger kurser lästa av mig, jobb jag haft, samt projekt jag gjort. 

Till APIt kan tre olika anrop göras
url/courses
url/projects
url/jobs

I filen database.php måste egna databasiställningar fyllas i.
## Kod för att skapa de nödvändiga databastabellerna
```
 CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `school` varchar(128) NOT NULL,
  `program` varchar(128) NOT NULL,
  `startyear` varchar(122) NOT NULL,
  `endyear` varchar(122) NOT NULL,
  `points` varchar(12) NOT NULL
)

CREATE TABLE `job` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `place` varchar(128) NOT NULL,
  `startyear` varchar(122) NOT NULL,
  `endyear` varchar(122) NOT NULL
) 

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `img` varchar(128) NOT NULL,
  `imgmobile` varchar(128) NOT NULL,
  `url` varchar(400) NOT NULL,
  `keywords` text NOT NULL,
  `description` text NOT NULL,
  `title` varchar(128) NOT NULL
) 

```