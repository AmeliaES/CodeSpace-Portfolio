describe('registration page creates new user', () => {
  // Clean up the database and remove test user
  before(() => {
    // Define the SQL query to delete a user by email
    const email = 'test+test@MKTIMEdomainForTesting.com';
    const query = `mysql -u root -S /Applications/XAMPP/xamppfiles/var/mysql/mysql.sock -D MKTIMEportfolio -e "DELETE FROM users WHERE email='${email}'"`;

    // Execute the SQL query via exec()
    cy.exec(query).then((result) => {
      cy.log(result); // Log the result of the query execution
    });
  });

  beforeEach(() => {
    cy.visit('http://localhost/codespace/MKTIME/public/reg.php');
  });

  it('checks registration form elements exist', () => {
    cy.get('[data-cy="firstName"]').should('exist');
    cy.get('[data-cy="lastName"]').should('exist');
    cy.get('[data-cy="email"]').should('exist');
    cy.get('[data-cy="phone"]').should('exist');
    cy.get('[data-cy="adLine1"]').should('exist');
    cy.get('[data-cy="adLine2"]').should('exist');
    cy.get('[data-cy="country"]').should('exist');
    cy.get('[data-cy="password"]').should('exist');
    cy.get('[data-cy="confirmPassword"]').should('exist');
    cy.get('[data-cy="submit"]').should('exist');
  });

  it('registers a new user succesfully', () => {
    cy.get('[data-cy="firstName"]').type('TestUserForCypress');
    cy.get('[data-cy="lastName"]').type('TestUserForCypressLastName');
    cy.get('[data-cy="email"]').type('test+test@MKTIMEdomainForTesting.com');
    cy.get('[data-cy="phone"]').type('1234567890');
    cy.get('[data-cy="adLine1"]').type('123 Test Address');
    cy.get('[data-cy="adLine2"]').type('Test Address Line 2');
    cy.get('[data-cy="country"]').type('UK');
    cy.get('[data-cy="password"]').type('123456');
    cy.get('[data-cy="confirmPassword"]').type('123456');
    cy.get('[data-cy="submit"]').click();
    // get toast and check for success message
    cy.get('[data-cy="toastText"]').should(
      'include.text',
      'You are now registered'
    );
  });

  it('checks for duplicate email error', () => {
    cy.get('[data-cy="firstName"]').type('TestUserForCypress');
    cy.get('[data-cy="lastName"]').type('TestUserForCypressLastName');
    cy.get('[data-cy="email"]').type('test+test@MKTIMEdomainForTesting.com');
    cy.get('[data-cy="phone"]').type('1234567890');
    cy.get('[data-cy="adLine1"]').type('123 Test Address');
    cy.get('[data-cy="adLine2"]').type('Test Address Line 2');
    cy.get('[data-cy="country"]').type('UK');
    cy.get('[data-cy="password"]').type('123456');
    cy.get('[data-cy="confirmPassword"]').type('123456');
    cy.get('[data-cy="submit"]').click();
    // get toast and check for error message
    cy.get('[data-cy="toastText"]').should(
      'include.text',
      'Email address already registered.'
    );
  });

  it('checks for empty fields error', () => {});

  it('checks for password mismatch error', () => {});
});
