Feature: Search
  As a visitor
  I want to search for courses and paths
  In order to find the content I am interested in

  Scenario Outline: Visitor can find courses and paths
    Given I am a visitor
    When I am on the "search" page
    And I filter by <category>
    And I search by <keyword>
    Then I see the correct <result>

    Examples:
      | category    | keyword | result                             |
      | "paths"     | "dev"   | "Junior Web Developer"             |
      | "courses"   | "css"   | "Create Web Page Layouts With CSS" |