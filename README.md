
- Run `npm install` in the git repo to install the necessary modules.
- Run `composer start` to begin the application
- Run `` to run the unit tests

- Database Set-up: 
  - Create a MySQL database called CV.
  - Import db/portfolio_db.sql.


**Things to Do**
-
- Add, Edit and Delete functionalities for all but WE??
- Fix editAboutMeController functionality??
- Unit testing
- Validation
- Format message response
  - replace in each controller so standard response gets given. Use Utility Class


# Portfolio RESTful API Routes


**About Me**
---

URL: `/about-me`

---

`GET`

* Gets all about me entries from the about_me table, not including deleted entries.

* **Success Response:**

  * **Code:** 201 <br />
    **Content:** `{
    "success": true,
    "message": "Retrieved all about me!",
    "data": {
       "name": "nova",
       "description": "Nova is my beautiful poochon puppy, and she is the light of my life."
       }
    }`

* **Error Response:**

  * **Code:** 400 BAD REQUEST <br />
    **Content:** `{
    "success": false,
    "message": "Something went wrong!"
    }`

* **Sample Call:**

```javascript
fetch('http://localhost:3000/about-me', {
    method: 'GET',
    headers: {'Content-Type': 'application/json'}
})
  ```

--- 

`POST`
* Adds a single new about me entry to the about_me table.
* **Data Params**

```javascript
{
    "name": [string],
    "description": [string]
};
  ```

* **Success Response:**

  * **Code:** 201 <br />
    **Content:** `{
    "success": true,
    "message": "New about me added!"
    }`

* **Error Response:**

  * **Code:** 400 BAD REQUEST <br />
    **Content:** `{
    "success": false,
    "message": "Validation failed :( Check your input!"
    }`

  OR

  * **Code:** 400 BAD REQUEST <br />
    **Content:** `{
    "success": false,
    "message": "Something went wrong!"
    }`

* **Sample Call:**

```javascript
fetch('http://localhost:3000/about-me', {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({
        name: "nova",
        description: "Nova is the absolute best dog in the whole world, she is everything."
    })
})
  ```

---

URL: `/about-me/{id}`

---

`PUT`

---

`DELETE`

- Deletes a single about me entry in the about_me table.
* **Success Response:**

  * **Code:** 201 <br />
    **Content:** `{
    "success": true,
    "message": "About me removed!"
    }`

* **Error Response:**

  * **Code:** 400 BAD REQUEST <br />
    **Content:** `{
    "success": false,
    "message": "Something broke :( Not removed"
    }`

* **Sample Call:**

```javascript
fetch('http://localhost:3000/work-experience/5', {
    method: 'DELETE',
    headers: {'Content-Type': 'application/json'}
})
  ```

---

URL: `/about-me/{name}`

---

`GET`

* Gets one about me entry from the about_me table, based on the about me name.

* **Success Response:**

  * **Code:** 201 <br />
    **Content:** `{
    "success": true,
    "message": "Retrieved about me!",
    "data": {
    "name": "puppy",
    "description": "Puppies are magnificent, they will cheer you up beyond belief."
    }
    }`

* **Error Response:**

  * **Code:** 400 BAD REQUEST <br />
    **Content:** `{
    "success": false,
    "message": "Something went wrong!"
    }`

* **Sample Call:**

```javascript
fetch('http://localhost:3000/about-me/puppy', {
    method: 'GET',
    headers: {'Content-Type': 'application/json'}
})
  ```

---

**Education**
---

URL: `/education`

---

`GET`

* Gets all education entries from the education table, not including deleted entries.

* **Success Response:**

  * **Code:** 201 <br />
    **Content:** `{
    "success": true,
    "message": "Retrieved all education!",
    "data": [{
    "id": 1
    "level": "A Levels",
    "institution": "Nova's Magical Institution of Puppies",
    "grade": null,
    "startDate": "2020-12-01",
    "endDate": "2022-01-31"
    }, ...]
    }`

* **Error Response:**

  * **Code:** 400 BAD REQUEST <br />
    **Content:** `{
    "success": false,
    "message": "Something went wrong!"
    }`

* **Sample Call:**

```javascript
fetch('http://localhost:3000/about-me', {
    method: 'GET',
    headers: {'Content-Type': 'application/json'}
})
  ```

---

`POST`

* **Data Params**

```javascript
{
    "level": [string],
    "institution": [string], 
    "grade": [string],
    "startDate": [string] (date format: YYYY-MM-DD),
    "endDate": [string] (date format: YYYY-MM-DD)
};
  ```
  _*grade, startDate and endDate are all optional parameters. Default value null._

* **Success Response:**

  * **Code:** 201 <br />
    **Content:** `{
    "success": true,
    "message": "New education added!"
    }`

* **Error Response:**

  * **Code:** 400 BAD REQUEST <br />
    **Content:** `{
    "success": false,
    "message": "Validation failed :( Check your input!"
    }`

  OR

  * **Code:** 400 BAD REQUEST <br />
    **Content:** `{
    "success": false,
    "message": "Something went wrong!"
    }`

* **Sample Call:**

```javascript
fetch('http://localhost:3000/education', {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({
      "level": "A Levels",
      "institution": "Nova's Magical Institution of Puppies",
      "grade": "A*",
      "startDate": "2020-12-01",
      "endDate": "2022-01-31"
    })
})
  ```

---

URL: `/education/{id}`

---

`PUT`

---

`DELETE`

- Deletes a single education entry in the education table.
* **Success Response:**

  * **Code:** 201 <br />
    **Content:** `{
    "success": true,
    "message": "Education removed!"
    }`

* **Error Response:**

  * **Code:** 400 BAD REQUEST <br />
    **Content:** `{
    "success": false,
    "message": "Something broke :( Not removed"
    }`

* **Sample Call:**

```javascript
fetch('http://localhost:3000/education/12', {
    method: 'DELETE',
    headers: {'Content-Type': 'application/json'}
})
  ```

---

**Hobbies**
---

URL: `/hobbies`

---

`GET`

* Gets all hobby entries from the hobbies table, not including deleted entries.

* **Success Response:**

  * **Code:** 201 <br />
    **Content:** `{
    "success": true,
    "message": "Retrieved all education!",
    "data": [{
    "id": 1
    "name": "Brushing Nova"
    }, ...]
    }`

* **Error Response:**

  * **Code:** 400 BAD REQUEST <br />
    **Content:** `{
    "success": false,
    "message": "Something went wrong!"
    }`

* **Sample Call:**

```javascript
fetch('http://localhost:3000/hobbies', {
    method: 'GET',
    headers: {'Content-Type': 'application/json'}
})
  ```

---

`POST`
* Adds a single hobby entry into the hobbies table.
* **Data Params**

```javascript
{
    "name": [string]
};
  ```

* **Success Response:**

  * **Code:** 201 <br />
    **Content:** `{
    "success": true,
    "message": "New hobby added!"
    }`

* **Error Response:**

  * **Code:** 400 BAD REQUEST <br />
    **Content:** `{
    "success": false,
    "message": "Validation failed :( Check your input!"
    }`

  OR

  * **Code:** 400 BAD REQUEST <br />
    **Content:** `{
    "success": false,
    "message": "Something went wrong!"
    }`

* **Sample Call:**

```javascript
fetch('http://localhost:3000/hobbies', {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({
      "name": "Loving Nova excessively"
    })
})
  ```

---

URL: `/hobbies/{id}`

---

`PUT`

---

`DELETE`

- Deletes a single hobby entry in the hobbies table.
* **Success Response:**

  * **Code:** 201 <br />
    **Content:** `{
    "success": true,
    "message": "Hobby removed!"
    }`

* **Error Response:**

  * **Code:** 400 BAD REQUEST <br />
    **Content:** `{
    "success": false,
    "message": "Something broke :( Not removed"
    }`

* **Sample Call:**

```javascript
fetch('http://localhost:3000/hobbies/1', {
    method: 'DELETE',
    headers: {'Content-Type': 'application/json'}
})
  ```

---

**Other Certifications**
---

URL: `/other-certifications`

---

`GET`

* Gets all other certification entries from the other_certifications table, not including deleted entries.

* **Success Response:**

  * **Code:** 201 <br />
    **Content:** `{
    "success": true,
    "message": "Retrieved all other certifications!",
    "data": [{
    "id": 1
    "name": "Puppy Training",
    "certifier": "Nova the Poochon",
    "date_achieved": "2022-08-28"
    }, ...]
    }`

* **Error Response:**

  * **Code:** 400 BAD REQUEST <br />
    **Content:** `{
    "success": false,
    "message": "Something went wrong!"
    }`

* **Sample Call:**

```javascript
fetch('http://localhost:3000/other-certifications', {
    method: 'GET',
    headers: {'Content-Type': 'application/json'}
})
  ```

---

`POST`

* Adds a single new other certification entry into the other_certifications table
* **Data Params**

```javascript
{
    "name": [string],
    "certifier": [string],
    "dateAchieved": [string] (date format: YYYY-MM-DD)
};
  ```

* **Success Response:**

  * **Code:** 201 <br />
    **Content:** `{
    "success": true,
    "message": "New other certification added!"
    }`

* **Error Response:**

  * **Code:** 400 BAD REQUEST <br />
    **Content:** `{
    "success": false,
    "message": "Validation failed :( Check your input!"
    }`

  OR

  * **Code:** 400 BAD REQUEST <br />
    **Content:** `{
    "success": false,
    "message": "Something went wrong!"
    }`

* **Sample Call:**

```javascript
fetch('http://localhost:3000/other-certifications', {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({
      "name": "Puppy Training",
      "certifier": "Nova the Poochon",
      "dateAchieved": "2022-08-28"
    })
})
  ```
_*dateAchieved is an optional parameters. Default value null._

---

URL: `/other-certifications/{id}`

---

`PUT`

---

`DELETE`

- Deletes a single other certification entry in the other_certifications table.
* **Success Response:**

  * **Code:** 201 <br />
    **Content:** `{
    "success": true,
    "message": "Other certification removed!"
    }`

* **Error Response:**

  * **Code:** 400 BAD REQUEST <br />
    **Content:** `{
    "success": false,
    "message": "Something broke :( Not removed"
    }`

* **Sample Call:**

```javascript
fetch('http://localhost:3000/other-certifications/22', {
    method: 'DELETE',
    headers: {'Content-Type': 'application/json'}
})
  ```
---

**Projects**
----

URL: `/projects`

---

`GET`

* Gets all project entries from the projects table, not including deleted entries.

* **Success Response:**

  * **Code:** 201 <br />
    **Content:** `{
    "success": true,
    "message": "Retrieved all projects!",
    "data": [{
    "id": 1
    "name": "Pet the Puppy",
    "about": "In this project I learnt how to pet Nova in the appropriately loving manner, from the master of cuddles herself.",
    "githubLink": "https://www.instagram.com/nova.and.crew, https://www.instagram.com/p/CYFLT7mMUQk/",
    "liveVersion": "https://www.instagram.com/p/CTVJmpisqTQ/"
    }, ...]
    }`

* **Error Response:**

  * **Code:** 400 BAD REQUEST <br />
    **Content:** `{
    "success": false,
    "message": "Something went wrong!"
    }`

* **Sample Call:**

```javascript
fetch('http://localhost:3000/projects', {
    method: 'GET',
    headers: {'Content-Type': 'application/json'}
})
  ```

---

`POST`

* Adds a single new project entry into the projects table
* **Data Params**

```javascript
{
    "name": [string],
    "about": [string],
    "githubLink": [string],
    "liveVersion": [string]
};
  ```
_*githubLink and liveVersion are optional parameters. Default value null._

_**two entries can be added to githubLink, to account for applications with a separate front-end and back-end._


* **Success Response:**

  * **Code:** 201 <br />
    **Content:** `{
    "success": true,
    "message": "New project added!"
    }`

* **Error Response:**

  * **Code:** 400 BAD REQUEST <br />
    **Content:** `{
    "success": false,
    "message": "Validation failed :( Check your input!"
    }`

  OR

  * **Code:** 400 BAD REQUEST <br />
    **Content:** `{
    "success": false,
    "message": "Something went wrong!"
    }`

* **Sample Call:**

```javascript
fetch('http://localhost:3000/projects', {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({
      "name": "Pet the Puppy",
      "about": "In this project I learnt how to pet Nova in the appropriately loving manner, from the master of cuddles herself.",
      "githubLink": "https://www.instagram.com/nova.and.crew, https://www.instagram.com/p/CYFLT7mMUQk/",
      "liveVersion": "https://www.instagram.com/p/CTVJmpisqTQ/"
    })
})
  ```

---

URL: `/projects/{id}`

---

`PUT`

---

`DELETE`

- Deletes a single project entry in the projects table.
* **Success Response:**

  * **Code:** 201 <br />
    **Content:** `{
    "success": true,
    "message": "Project removed!"
    }`

* **Error Response:**

  * **Code:** 400 BAD REQUEST <br />
    **Content:** `{
    "success": false,
    "message": "Something broke :( Not removed"
    }`

* **Sample Call:**

```javascript
fetch('http://localhost:3000/projects/2', {
    method: 'DELETE',
    headers: {'Content-Type': 'application/json'}
})
  ```
---

**Work Experience**
----

URL: `/work-experience`

---

`GET`

* Gets all work experience entries from the work_experience table, not including deleted entries.

* **Success Response:**

  * **Code:** 201 <br />
    **Content:** `{
    "success": true,
    "message": "Retrieved all work experience!",
    "data": [{
    "id": 1
    "company": "Nova's Sausages Ltd",
    "position": "Lowly Dog Owner",
    "start_date": "2020-08-28",
    "leave_date": "2024-12-21",
    "about": null
    }, ...]
    }`

* **Error Response:**

  * **Code:** 400 BAD REQUEST <br />
    **Content:** `{
    "success": false,
    "message": "Something went wrong!"
    }`

* **Sample Call:**

```javascript
fetch('http://localhost:3000/work-experience', {
    method: 'GET',
    headers: {'Content-Type': 'application/json'}
})
  ```

---

`POST`

* Adds a single new work experience entry into the work_experience table
* **Data Params**

```javascript
{
    "company": [string],
    "position": [string],
    "startDate": [string] (date format: YYYY-MM-DD),
    "endDate": [string] (date format: YYYY-MM-DD)
};
  ```
_*startDate and endDate are optional parameters. Default value null._

* **Success Response:**

  * **Code:** 201 <br />
    **Content:** `{
    "success": true,
    "message": "New work experience added!"
    }`

* **Error Response:**

  * **Code:** 400 BAD REQUEST <br />
    **Content:** `{
    "success": false,
    "message": "Validation failed :( Check your input!"
    }`

  OR

  * **Code:** 400 BAD REQUEST <br />
    **Content:** `{
    "success": false,
    "message": "Something went wrong!"
    }`

* **Sample Call:**

```javascript
fetch('http://localhost:3000/work-experience', {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({
      "company": "Nova's Sausages Ltd",
      "position": "Lowly Dog Owner",
      "startDate": "2020-08-28"
    })
})
  ```

---

URL: `/work-experience/{id}`

---

`PUT`

---

`DELETE`

- Deletes a single work experience entry in the work_experience table.
* **Success Response:**

  * **Code:** 201 <br />
    **Content:** `{
    "success": true,
    "message": "Work experience removed!"
    }`

* **Error Response:**

  * **Code:** 400 BAD REQUEST <br />
    **Content:** `{
    "success": false,
    "message": "Something broke :( Not removed"
    }`

* **Sample Call:**

```javascript
fetch('http://localhost:3000/work-experience/5', {
    method: 'DELETE',
    headers: {'Content-Type': 'application/json'}
})
  ```


