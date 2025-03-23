describe('registration page creates new user', () => {
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
    cy.get('[data-cy="email"]').type('test_user123@email.com');
    cy.get('[data-cy="phone"]').type('1234567890');
    cy.get('[data-cy="adLine1"]').type('123 Test Address');
    cy.get('[data-cy="adLine2"]').type('Test Address Line 2');
    cy.get('[data-cy="country"]').type('UK');
    cy.get('[data-cy="password"]').type('123456');
    cy.get('[data-cy="confirmPassword"]').type('123456');
    cy.get('[data-cy="submit"]').click();
    // get toast and check for success message
    cy.get('[data-cy="toastText"]').should(
      'have.text',
      'You are now registered'
    );
  });
});
