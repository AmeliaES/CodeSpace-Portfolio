describe('registration page creates new user', () => {
  // Clean up the database and remove test user both before and after tests
  const email = 'test+test@MKTIMEdomainForTesting.com';
  const deleteUserQuery = `mysql -u root -S /Applications/XAMPP/xamppfiles/var/mysql/mysql.sock -D MKTIMEportfolio -e "DELETE FROM users WHERE email='${email}'"`;

  beforeEach(() => {
    // Remove test user before tests start
    cy.exec(deleteUserQuery).then((result) => {
      cy.log('User cleanup before test:', result);
    });

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
    // Create a user
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

    // Create a duplicate user
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

  it('checks for password mismatch error', () => {
    cy.get('[data-cy="firstName"]').type('TestUserForCypress');
    cy.get('[data-cy="lastName"]').type('TestUserForCypressLastName');
    cy.get('[data-cy="email"]').type('test+test@MKTIMEdomainForTesting.com');
    cy.get('[data-cy="phone"]').type('1234567890');
    cy.get('[data-cy="adLine1"]').type('123 Test Address');
    cy.get('[data-cy="adLine2"]').type('Test Address Line 2');
    cy.get('[data-cy="country"]').type('UK');
    cy.get('[data-cy="password"]').type('123456');
    cy.get('[data-cy="confirmPassword"]').type('qwertyasdfg');
    cy.get('[data-cy="submit"]').click();
    // Check toast for error
    cy.get('[data-cy="toastText"]').should(
      'include.text',
      'Passwords do not match'
    );
  });
});
