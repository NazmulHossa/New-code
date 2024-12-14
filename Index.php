<?php
// Function to evaluate the quiz
function evaluateQuiz(array $questions, array $answers): int {
    $score = 0;
    foreach ($questions as $index => $question) {
        if (isset($answers[$index]) && strtolower($answers[$index]) == strtolower($question['correct'])) {
            $score++;
        }
    }
    return $score;
}

// Array of questions and correct answers
$questions = [
    ['question' => 'What is 2 + 2?', 'correct' => '4'],
    ['question' => 'What is the capital of France?', 'correct' => 'Paris'],
    ['question' => 'Who wrote "Hamlet"?', 'correct' => 'Shakespeare']
];

// Collect answers from the user
$answers = [];
echo "Welcome to the Quiz!\n\n";
foreach ($questions as $index => $question) {
    echo ($index + 1) . ". " . $question['question'] . "\n";
    $answers[$index] = readline("Your answer: ");
}

// Evaluate the user's score
$score = evaluateQuiz($questions, $answers);
$totalQuestions = count($questions);

// Display the results
echo "\nYou scored $score out of $totalQuestions.\n";
if ($score == $totalQuestions) {
    echo "Excellent job!\n";
} elseif ($score > $totalQuestions / 2) {
    echo "Good effort!\n";
} else {
    echo "Better luck next time!\n";
}
?>