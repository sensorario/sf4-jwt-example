Feature:
    In order to prove that the Behat Symfony extension is correctly installed
    As a user
    I want to have a demo scenario

    Scenario: It receives a response from Symfony's kernel
        When client sends GET request to "/"
        Then the response should be received
        And the response should be:
        """
        {
        "message": "Welcome to your new controller!",
        "path": "src/Controller/DefaultController.php"
        }
        """

    Scenario: fake login
        When client sends POST request to "/login":
        """
        {
        "username": "sensorario",
        "password": "password"
        }
        """
        Then the response should be received
        #And the response is shown

    Scenario: author info
        When client sends GET request to "/author"
        And the response should be:
        """
        {
        "username": "sensorario",
        "url": "http://sensorario.github.io"
        }
        """
