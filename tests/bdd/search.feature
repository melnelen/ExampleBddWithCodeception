Feature: Search
  As a visitor
  I want to search for paths
  In order to find the one that I am interested in

  Scenario Outline: Visitor can find a path
    Given I am a visitor
    When I am on the "search" page
      And I filter by <category>
      And I search by <keyword>
    Then I see the correct <path>

    Examples:
      | category | keyword | path                   |
      | "paths"  | "dev"   | "Junior Web Developer" |
      | "paths"  | "ai"    | "AI Engineer"          |
