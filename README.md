cakephp_salestax
================

cakephp_salestax is a cakephp app that demonstrates a solution
to the "sales tax problem":

> Preamble
> --------
> You will be evaluated on how you reach the solution, keeping
> in mind that the correctness of the solution will also be
> taken into consideration.
> 
> Objectives
> ----------
> Your focus should be on clean and object-oriented code, unit
> testing and simple expandable design.
>
> Intro
> -----
> Basic sales tax is applicable at a rate of 10% on all goods,
> except books, food, and medical products that are exempt. 
> Import duty is an additional sales tax applicable on all
> imported goods at a rate of 5%, with no exemptions.
>
> Details
> -------
> When I purchase items I receive a receipt which lists the
> name of all the items and their price (including tax), 
> finishing with the total cost of the items, and the total
> amounts of sales taxes paid.  The rounding rules for sales
> tax are that for a tax rate of n%, a shelf price of p
> contains (np/100 rounded up to the nearest 0.05) amount of
> sales tax.
>
> Task
> ----
> Write an application that prints out the receipt details
> for these shopping baskets...
>
> INPUT:
> ------
> __Input 1__:
> - 1 book at 12.49
> - 1 music CD at 14.99
> - 1 chocolate bar at 0.85
>
> __Input 2__:
> - 1 imported box of chocolates at 10.00
> - 1 imported bottle of perfume at 47.50
>
> __Input 3__:
> - 1 imported bottle of perfume at 27.99
> - 1 bottle of perfume at 18.99
> - 1 packet of headache pills at 9.75
> - 1 box of imported chocolates at 11.25
> 
> OUTPUT
> ------ 
> __Output 1__:
> - 1 book: 12.49
> - 1 music CD: 16.49
> - 1 chocolate bar: 0.85
> - Sales Taxes: 1.50
> - Total: 29.83
>  
> __Output 2__:
> - 1 imported box of chocolates: 10.50
> - 1 imported bottle of perfume: 54.65
> - Sales Taxes: 7.65
> - Total: 65.15
>  
> __Output 3__:
> - 1 imported bottle of perfume: 32.19
> - 1 bottle of perfume: 20.89
> - 1 packet of headache pills: 9.75
> - 1 imported box of chocolates: 11.85
> - Sales Taxes: 6.70
> - Total: 74.68

Assumptions
-----------
1. There are 7 distinct products:
  1. book
  2. music CD
  3. chocolate bar
  4. imported box of chocolates
     (same as 'box of imported chocolates')
  5. imported bottle of perfume
  6. bottle of perfume
  7. packet of headache pills
2. They each have a "usual price"
   (the first price listed in the "inputs")
3. When inputting items into the register, prices can be overridden
   for whatever reason:
  - Discounted product?
  - Defect?
  - Wrong price?
  - Market fluctuations?
4. We can live with a command-line interface app.
  1. "price" represents "unit price" during item input
  2. "quantity" will multiply "price"
5. Part of the input will be from the database, and another part
   will be from command-line interactions.

Features
--------
1. Use of MVC framework for rapid development; avoid reinventing the wheel;
   keep code simple, clean, and object-oriented.
2. Test-driven development to have rapid and testable development sprints.
3. Database-driven so that between app uses, all orders are
   saved.
  - Retrieval of said history is not directly an implementation
    goal for the solution of the excercise, but having the option
    open leaves room for easy expansion into reports, analytics, etc.
4. "Sales Tax" and "Import Tax" are recorded separately, to enable simpler
   accounting summations later on.
5. Quantities are "float" values; so fractions of items may be purchased
   - EX: 1.5 lbs of apples

Target Platform
---------------
- TurnKeyLinux 12.0 (http://www.turnkeylinux.org/core)
- Ubuntu 12.04 LTS
- Any other Debian-based Linux of similar or better pedigree (Debian 6.0 "squeeze")
 
Requirements
------------
- cakephp 2.3.5 (more or less)
- php5-cli
- php5-sqlite

Optional
--------
- phpunit

Sample Installation
-------------------

_Quickstart notes_:

> A pre-filled sqlite3 database is included. It partially serves as "input",
> providing a schema and the 7 products featured.

Here are a few lines that can be bashed into the terminal to get the app
installed and executable. It is assumed you'll starting with a "fresh install"
environment of TurnKeyLinux 12.0

```sh
apt-get update
apt-get install php5-cli phpunit php5-sqlite -y
git clone https://github.com/cakephp/cakephp.git
cd cakephp
git checkout -b 2.3 2.3.5
git clone https://github.com/starlocke/cakephp_salestax.git
cd cakephp_salestax
cp cakephp_salestax.sqlite3.prefilled cakephp_salestax.sqlite3
```

App Launch
----------
Once installed, this command will run the CashierShell app:

```sh
./Console/cake cashier
```

Unit Testing
------------
Once installed, this command will run the unit test for Orders:

```sh
./Console/cake test app Model/Order
```

No other unit tests were made for this small excercise.


App Mini Manual
---------------
When the "CashierShell" app is started, it is essentially an infinite loop
of orders.

The user is prompted for 3 inputs, in order:
- quantity (default 0, quits)
- product_id (no default)
- price (default price of the product)

At the prompt, the user may immediately press ENTER to use the default
value that was provided in [square brackets].

If an invalid input was provided, the user will need to retry until a valid
value has been input.


License
-------
MIT

*Free Software, Awww~ Yeah~!*

