# User Story

**As a** Marketing Executive at MegaLand\
**I want to** capture Visitor details\
**So that** I can wow our customers with amazing deals/offers/news about our Resort.

**Context:** This imaginary story would be part of a wider epic. The team has decided that it's valuable to split out a wider User Registration piece
into smaller components in line with [INVEST](https://www.agilealliance.org/glossary/invest/).

# Acceptance criteria

A Registered User [domain entity](https://enterprisecraftsmanship.com/2016/01/11/entity-vs-value-object-the-ultimate-list-of-differences/) is created with the following **required** properties:
    - First name (max 32 chars)
    - Last name (max 32 chars)
    - Date of birth (min age, 13 years old)
        - It should be possible to get the user's age in years as this'll be displayed in the App's UI.
    - Email address (max 254 chars)
    - Password (max 32 chars)

# Developer notes

- Namespace can be `AttractionsIo\Domain\*`
- Vanilla OOP PHP should be used.
- The domain entity should utilise at least one [value object](https://enterprisecraftsmanship.com/2016/01/11/entity-vs-value-object-the-ultimate-list-of-differences/), of which date of birth should be one.
- Date of Birth and Email Address should be covered with Unit Tests.
- To keep the task short, **do not** persist to a data store, just interested in the Domain Entity itself.
- README included with any necessary setup instructions in order to run Unit Tests.
- **Optional Bonus:** Should be containerised via a Docker, using docker-compose to orchestrate the containers.

The analogy for this simple test is a master chef asking a prospective chef to cook an omellete. It's simple enough that it's minimal effort & set up, but it's enough to give an insight into execution and have a discussion around.
