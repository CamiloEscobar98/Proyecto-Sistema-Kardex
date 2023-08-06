<?php

return [
    'welcome' => [
        'title' => 'Welcome to the Kardex System Implementation Application!',
        'introduction' => 'The objective of this technical test is to develop an object-oriented solution with the industry\'s best practices for creating a Kardex system that controls the products of the "Hulk Store" shop, specialized in items based on Marvel and DC comics superheroes.',
        'requirements' => [
            'title' => 'Application Requirements',
            'text' => "
            A Kardex system needs to be developed to:<br>
                1. Control the inventory and register new products.<br>
                2. Track product availability.<br>
                3. Update inventory quantities through sales.<br>
                4. Allow sellers to make changes to product quantities through corresponding interfaces.<br>
            <br>
            The system must allow queries with different filters and generate a daily report on the current state of the Kardex. Movements with products that have no stock should be restricted.",
        ],
        'rules' => [
            'title' => 'Important Rules',
            'text' => '
            Any appropriate data structure or in-memory database can be used.<br>
                1. There is no requirement to work under a pre-existing code architecture; the goal is to use the best option with design patterns and best practices.<br>
                2. There are no time restrictions for the submission.<br>
                3. The test must be done in PHP using the Laravel framework.<br>
                4. An basic user interface is expected if possible, but in case it is not feasible, the submission in Postman will be accepted.<br>
                5. It is necessary to provide unit tests as part of the development.<br> '
        ]

    ]
];
