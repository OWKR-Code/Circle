
        <?php
        // Establish database connection
        $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        // Check connection
        if ($con->connect_error) {
            echo "<p>Database connection failed: " . htmlspecialchars($con->connect_error) . "</p>";
        } else {
            // Query to fetch posts
            $query = "SELECT * FROM `POSTS`";
            $result = $con->query($query);

            if ($result) {
                if ($result->num_rows > 0) {
                    // Display posts
                    while ($row = $result->fetch_assoc()) {
                        echo "<p>" . htmlspecialchars($row['content']) . "</p>";
                    }
                } else {
                    echo "<p>No posts available at the moment.</p>";
                }
            } else {
                // Query failed
                echo "<p>Error fetching posts: " . htmlspecialchars($con->error) . "</p>";
            }

            // Free the result set and close connection
            $result->free();
            $con->close();
        }
        ?>