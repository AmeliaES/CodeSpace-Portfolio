# Portfolio Website

This project demonstrates my web dev skills using PHP, html, CSS, SQL as well as testing using Cypress.

## The Brief

"MK Time is a growing E-Commerce business. The company sell Swiss watches which are designed and manufactured in Edinburgh. They pride themselves in selling only quality products and guaranteeing servicing and repair. The company want a dedicated website that will display/view well on all types of devices to help promote the business.

Due to the increasing popularity, they anticipate a wide range of end-users and want a website that will appeal to the target clientele. They want the site to bring in more business and hence profits as well as promoting their unique designs and elegant time pieces."

## Disclaimer

This is a dummy website to showcase my coding skills and not an actual shop website. The text content is fictional and was generated using chatGPT and all images were found online from [Unsplash](https://help.unsplash.com/en/), [pexels](https://www.pexels.com/) or creative commons google image searches.

## Making the website:

### Test strategy

Applying E2E testing using Cypress. See `.cy.js` files in [`cypress/e2e/`](cypress/e2e/). First test the most likely things a user would do, ie. the riskiest most used path. Then test for edge cases.

Test cases:

#### Registration page

- test that all the elements in the form exist
- test that a new user can be registered with a success toast pop up message.
- test that the success toast pop up message Log In link is correct.
- test that an error occurs if the user puts in an email address that already exists in data base.
- test that an error occurs if the user puts in two passwords that do not match.
- test that the form is not submitted if any of the fields is empty.

### Using githooks

This ensures the files are copied to the web server at XAMPP, so I don't have to manually do this. Certain file types and folders are ignored for transfer. eg. the `sql/` folder is not copied. I wasn't sure where to put the SQL scripts to initially make the database in phpMyAdmin but wanted to make sure they are git tracked.

`SOURCE_DIR` and `TARGET_DIR` will need changing. Better practice would be to put this in a `.env` file perhaps, or a `.config` file. So that this project can run on different computers more easily.

## Things I learnt:

- [PHP Form validation](https://www.w3schools.com/php/php_form_validation.asp): Use `<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>` to protect against cross-site scripting (XSS).

- [Salting and Hashing Passwords](https://phptherightway.com/): Scroll down to section on "Password Hashing". `password_hash()` also takes care of salting (adding a random string to each password before hashing).
