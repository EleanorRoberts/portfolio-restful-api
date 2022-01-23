
- Run `npm install` in the git repo to install the necessary modules.
- Run `composer start` to begin the application
- Run `` to run the unit tests

- Database Set-up: 
  - Create a MySQL database called CV.
  - Import db/portfolio_db.sql.


**Things to Do**
-
- Add, Edit and Delete functionalities for all but WE
- Fix editAboutMeController functionality
- Unit testing
- Validation
- Format message response
  - replace in each controller so standard response gets given. Use Utility Class


# Portfolio RESTful API Documentation

Create a MySQL database called CV.
Import db/portfolio_db.sql.

**Add About Me**
----
Adds a single new about me entry into the about_me table

* URL: `/about-me`

* **Method:**

  `POST`

* **Data Params**

  **Required:**

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

**Add Education**
----
Adds a single new education entry into the education table

* URL: `/education`

* **Method:**

  `POST`

* **Data Params**

  **Required:**

```javascript
{
    "level": [string],
    "institution": [string]
};
  ```

  **Including optional:**

```javascript
{
    "level": [string],
    "institution": [string],
    "grade": [string],
    "startDate": [string] (date format: YYYY-MM-DD),
    "endDate": [string] (date format: YYYY-MM-DD)
};
  ```

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

**Add Hobby**
----
Adds a single new hobby entry into the hobby table

* URL: `/hobbies`

* **Method:**

  `POST`

* **Data Params**

  **Required:**

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

**Add Other Certification**
----
Adds a single new other certification entry into the other certifications table

* URL: `/other-certification`

* **Method:**

  `POST`

* **Data Params**

  **Required:**

```javascript
{
    "name": [string],
    "certifier": [string]
};
  ```

**Including optional:**

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

**Add Project**
----
Adds a single new project entry into the projects table

* URL: `/projects`

* **Method:**

  `POST`

* **Data Params**

  **Required:**

```javascript
{
    "name": [string],
    "about": [string]
};
  ```

**Including optional:**

```javascript
{
    "name": [string],
    "about": [string],
    "githubLink": [string],
    "liveVersion": [string]
};
  ```

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
Note: two entries can be added to GitHub links, to account for applications with a separate front-end and back-end.

///////

**Get All Markers**
----
Returns an array of all markers currently in the database.

* URL: `/markers`

* **Method:**

  `GET`

* **Success Response:**

  * **Code:** 201 <br />
    **Content:**
  *  `{
     success: true,
     message: 'Successfully found markers',
     data: [{
     walkName: 'Novas Walk',
     markersObject: { lat: 8.1213, lng: -14.529 },
     id: new ObjectId("XXX")
     }`

* **Error Response:**

  * **Code:** 400 BAD REQUEST <br />
    **Content:** `{
    success: false,
    message: 'No markers returned :(',
    data: []
    }`


* **Sample Call:**

```javascript
fetch('http://localhost:3000/markers', {
    method: 'GET',
    headers: {'Content-Type': 'application/json'}
})
  ```
