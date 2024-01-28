<?php
// Check for necessary permissions
if (!function_exists('exec')) {
    die("Cannot execute system commands. Please enable exec() function or grant necessary permissions.");
}

// Capture input from form (if submitted) or use defaults
$num_cpus = isset($_POST['cpus']) ? intval($_POST['cpus']) : 2;  // Number of CPUs to stress
$duration = isset($_POST['duration']) ? intval($_POST['duration']) : 60;  // Duration in seconds

// Validate input
if ($num_cpus <= 0 || $duration <= 0) {
    die("Invalid input: Number of CPUs and duration must be positive integers.");
}

// Construct the stress command with proper escaping
$command = escapeshellcmd("stress -c $num_cpus -t $duration");

// If form is submitted, execute the command
if (isset($_POST['submit'])) {
    $output = shell_exec($command);
    echo "<pre>$output</pre>";
    echo "CPU stress test completed successfully.";
} else {
    // Display the HTML form
?>
<form method="post">
    <label for="cpus">Number of CPUs:</label>
    <input type="number" id="cpus" name="cpus" min="1" value="<?php echo $num_cpus; ?>"><br><br>
    <label for="duration">Duration (seconds):</label>
    <input type="number" id="duration" name="duration" min="1" value="<?php echo $duration; ?>"><br><br>
    <button type="submit" name="submit">Start Stress Test</button>
</form>
<?php
}
?>
