# Conventions in FTFS
*This document provides guidelines for writing code for and working on the Fair Trade Software Foundation (FTSF) website.*

**Below you can find the general guidelines for frontend setup by Competa IT.**

### Front-end guidelines

Just because you can, does not mean you should. Some solutions are not reliable, may not
perform well, or may be difficult to maintain over time or add more code to. Always
remember your code may not be the last added to a project in that particular feature area.
It is essential to understand the goals of the project and identify the specific deliverables
expected of the team. Where your responsibilities begin and end should not be taken for
granted or assumed. It's also important to understand what tools will be available and what
the differences are between development, test and production environments.
All teams should have an understanding of what the client's requirements are, please do not
make assumptions as to the technology available either from the client or their audience.

## General standards for code consistency
_Please note that there are many more standards, but this will a good start._

- Write easy-to-read code. We want to see simplified code.
- Maintain a clear separation of concerns, avoid in-line CSS and/or JavaScript.
- Use the same and clear patterns.
- Be explicit in your naming conventions.
- Make use of consistent indenting, use soft tabs, which is 4 spaces per tab.
- Build pages as a library of components.
- Make it browser and environment compatible.
- Use the D.R.Y (Don't Repeat Yourself) method.
- Think how the code will evolve and grow.
- External libraries should always be assessed for the pros/cons and potential benefits
vs the barrier to entry and level of effort involved in their usage.
- Deliver code as bug free as possible.
- Do not code deductive. Using comparisons that compare the negatives of each
other.

## HTML
- Use valid and semantic markup.
- Use classes, avoid id's in general.
- Always specify DOCTYPE and character encoding.
- Use lowercase names with hyphens separating.
- Tables are only used to display tabular data, not for page layout.
- All hyperlinks should point to absolute or relative URL's.
- Avoid using <br> tags to separate paragraphs.
- Check elements on browser support on Can I Use.
- Use Polyfill, Shim or Shiv for backwards compatibility when needed. A good tip
would be to have a look at Modernizr.
- Don't use id's or classes on HTML5 elements when you need backwards
compatibility.

## CSS
- Make your stylesheets easy to maintain.
- Be aware of what the default styles for HTML elements are going to be.
- Review the design first, plan around technical constraints and identify how content
will be managed.
- Use one level of indentation for each declaration .
- Use a new line for every selector and every declaration.
- Use a single blank line between sets of rule .
- Use a single space before the opening brace in a set of rules .
- Think how the code will evolve and grow.
- Consider which styles are global versus specific one-off use-cases.
- Exclude unused style rules.
- Consider the use of images as CSS background images vs in-line.
- Address different devices and browser version with as little code as possible.
- Do not use @import to include other stylesheets.
- Use lowercase for elements and shorthand hex values; avoid underscores and
camelCase.
- Quote attribute values in selectors.
- Use the minimum specificity required to achieve the desired style.
- Try applying a class to the element you want to target instead.
- Avoid using !important keyword and clearfixes.

## JavaScript
- Respect and maintain the formatting of an existing document.
- Do not include JavaScript in-line in the pages unless there is a good reason.
- Should be executed only when necessary on a given page or sets of pages.
- Open braces are preceded by a single space.
- Open braces should appear on the same line as their preceding argument.
- Close braces should appear at the same indentation as the statement preceding the
opening brace.
- There should be no space characters between parentheses and their contents.
- Always use === comparison, never ==.
- Avoid comparing to true and false.
- Avoid polluting the global name-space.
- Use semicolons and do not rely on automatic semicolon insertion.
- Strings should always use double quotes.
- Variable names should be camelCase.
- Objects, classes, and name-spaces should be TitleCase.
- Cached jQuery objects can be prefixed with $.
- Use shorthand version of empty Arrays and Objects.
- Always use meaningful variable names that can be read as words, not as silly
abbreviations only you understand.
- Use method names that make sense, such as init() or setup() for code that starts
things off.
- Be consistent on your project.
- Don't send too many function parameters, instead construct an object before-hand
or pass the object in-line.
- Settings and configuration options are common things to set in a centralized place.
- Only run scripts on a page that are needed for that page.
- Test if the code works on various browsers and devices.
- Do not modify JavaScript core objects .prototype unless you really know what you're
doing.

## AngularJS
_Please follow John Papa's style guide by all means._
John Papa: https://github.com/johnpapa/angular-styleguide

- Use the angular examples, which are in the example directory
- When in doubt look at John Papa’s style guide
- Use single variable declarations. i.e. var foo, bar, baz;
- Within a controller declare in structure:
    * Angular boilerplate on top
    * var and $scope declarations
    * functions
    * $scope.functions
    * API call (service method)
- Use Controllers to put values and functions in the view
- Directives are custom elements (but use the <div attr=””>
- Services are singletons. Use them for generic / multi-use functionality
- Use CONSTANTS, retyping ‘strings’, can lead to discrepancies

## Git
- Develop functioning is our master branch
- Develop must always be intact (working), breaking will have consequences
- When you are working on a story.
    * Branch of Develop
    * Create a feature branch i.e.: **<name-story>/<feature>**
    * Create a sub-feature from the feature branch for the increment i.e.:
**<name-story>/<sub-feature>**
    * This is the structure so if you merge use this structure to the top!
- Merge the feature branch into your sub-feature, before you create a pull request.
- Use logical, non-technical comments on your commits. That explain what you did!

## Definition of Ready (D.o.R.)
- A story can be pokered when:
    * All team members have a **CLEAR** idea of the **EXAMPLE STORY**
    * When the story is **CLEARLY** defined for everyone

## Definition of Done (D.o.D.)
- A Story is done when:
    * The code is completed on the sub-feature branch
    * The code has been **TESTED** in the browser
    * If all the incremented functionality **WORKS**
    * **AND** does not **BREAK** existing code
    * The feature branch is **MERGEd** into sub-feature
    * A **PULL REQUEST** is created
    * The Sticky is mode to **REVIEW**



---------------------------------------------------------------------------------------------------------------------------------
**In addition to the guidelines setup by Competa, the following guidelines/conventions are specifically for *FTSF*:** 

##### Frontend: 
- Use semantic HTML and correctly use HTML elements
- Use proper indentation (HTML/CSS/JS/PHP)
- Setup project modular 
- Use clear names for classes, IDs, variables
- Use Sass for styling
- Aim to nest max two levels deep when using Sass. Use class names to avoid nesting.
- Aim to use class names rather than IDs
- Use camel case when writing TypeScript (e.g. fooBar)
- Use lowercase and dashes for html class names (e.g. foo-bar)
- Use comments to clarify code when writing TypeScript/Sass (they are removed during compiling)

##### Backend:
- Use snake case when writing php function and variable names (e.g. foo_bar)
- Constants are in uppercase and snake case in php (e.g. FOO_BAR)
- Classes are in uppercamelcase in php (e.g. FooBar)
- Use double quotes (``""``) for strings in PHP.
- Table names in databases have: 
    - prefix from wordpress ($wpdb->prefix), **never hardcode "wp_"**  
    - theme/plugin name (e.g. ftsf_grid_)
    - table name (e.g. blocks)
    - example of table name: $wpdb->prefix . "ftsf_grid_"."blocks"
