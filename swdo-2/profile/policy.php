<?php
    // Load password policy class library
    // Use require to halt execution if loading fails
    require_once('password-policy.php');
    
    // Get password from submited data or default
    $passwords = ( isset($_POST['password']) ) ? $_POST['password'] : false;
    $policyErr = "";
    $error = "";
    $k = "";
    
    // Array defining rules
    $rules['min_length'] = 8;
    $rules['max_length'] = 64;
    
    // Create password policy object
    // Pass rule array in constructor
    $policy = new PasswordPolicy($rules);
    
    // Rules defined on object
    $policy->min_lowercase_chars = 1;
    $policy->min_uppercase_chars = 1;
    $policy->min_numeric_chars = 1;
    
    // Validate submitted password
    $valid = $policy->validate($passwords);
    
    // Show errors if submitted password is not valid
    if( !$valid ) {
    foreach( $policy->get_errors() as $k=>$error )
    $countErr = 1;
    $policyErr = "<div class=\"alert alert-danger alert-dismissible fade in\" role=\"alert\">
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span>
                    </button>
                    <strong><b id=\"$k\" >$error</b>
                  </div>";
    }
    
?>