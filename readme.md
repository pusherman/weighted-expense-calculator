Weighted Group Expense Calculator
===========================

Simple command line PHP script to calulate who owes what in a party with the ability to weight
groups (couples) more heavily than singles.

Useful when traveling with a group of couples and singles and expenses are split between everyone
equally but payments are dispursed through a single party representing multiple other people.

Example
-------
1 Couple and 1 Friend go on vacation.

The couple buys the first meal for for $300.75, the friend pays for sailing for the group at $200.00 and the couple pays for transportation at $50.28.

If each person is counted as an indvidual but paid as a married couple the program would show
the friend owes the married couple $116.57.

Usage
-------
* Setup the arrays in calc.php with who spent what
* Run the command `$ php calc.php`
