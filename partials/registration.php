<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting App - Registration</title>

    <!-- bootstrap CSS link -->
    <link 
       href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
       rel="stylesheet" 
       integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" 
       crossorigin="anonymous"
    >
</head>
<body class="bg-secondary">
    <h1 class="text-light text-center p-3">Voting System</h1>
    <div class="bg-info">
        
        <div class="container text-center py-3">
            <h2 class="text-center">Register Account</h2>
            <form action="../actions/register.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="text" class="form-control w-50 m-auto" name="username" placeholder="Enter your username" required="required">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control w-50 m-auto" name="mobile" placeholder="Enter your mobile number" required="required" maxlength="13" minlength="10">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control w-50 m-auto" name="password" placeholder="Enter your password" required="required">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control w-50 m-auto" name="confpass" placeholder="Confirm your password" required="required">
                </div>
                <div class="mb-3">
                    <input type="file" class="form-control w-50 m-auto" name="photo">
                </div>
                <div class="mb-3">
                    <select name="std" class="m-auto form-select w-50">
                        <option value="group">Group</option>
                        <option value="voter">Voter</option>
                    </select>
                </div>
                <button type="submit" class="my-4 btn btn-dark m-auto">Register</button>
                <p>Have an account? <a href="../index.php" class="text-white">Login here.</a></p>
            
            </form>
        </div>

    </div>
</body> 
</html>