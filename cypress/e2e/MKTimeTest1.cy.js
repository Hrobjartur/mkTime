describe('MK Time Login, Search, Add to cart, Checkout, Logout Test', () => {
  it('should login, purchase, logout successfully', () => {
    // Visit main page
    cy.visit('http://localhost:3006/index.php');

    // Find H1 with text MK Time
    cy.contains('h1.cyH1', 'MK TIME').should('exist');

    // Find the cySignIn button and click it
    cy.get('a.cySignIn').contains('SIGN IN').click();

    // Find H4 with text MK Time
    cy.contains('h4.cyH4', 'MK Time').should('exist');

    // Find the cyEmail input, click and type the email
    cy.get('input.cyEmail').click().type('test@db.com');

    // Find the cyPass input, click and type the password
    cy.get('input.cyPass').click().type('1234');

    // Find the cyLogin button and click it
    cy.get('input.cyLogin').click();

    // Find the cySearch button, click it and type a word
    cy.get('input.cySearch').click().type('Forge');

    // Find the cySearchSubmit button and click it
    cy.get('input.cySearchSubmit').click();
    
    // Find the cyAddToCard button and click it
    cy.get('a.cyAddToCard').contains('ADD TO CART').click();

    // Find the cyProceedCheckout button and click it
    cy.get('a.cyProceedCheckout').contains('Proceed to Checkout').click();

    // Find the cyCheckoutNow button and click it
    cy.get('a.cyCheckoutNow').contains('Checkout Now').click();

    // Find the cyLogout button and click it
    cy.get('a.cyLogout').contains('LOGOUT').click();
  });
});