<?php
/**
 * Security Audit Script - Find Hardcoded Credentials
 * 
 * This script helps identify files that may contain hardcoded credentials
 * Run this before committing to Git to ensure no sensitive data is exposed
 */

echo "🔍 OSHR Security Audit - Credential Scanner\n";
echo "==========================================\n\n";

$projectRoot = __DIR__;
$issues = [];
$warnings = [];

// Files to scan
$filesToScan = [
    '*.php',
    '*.md',
    '*.txt',
    '*.json',
    '*.js'
];

// Patterns to look for
$dangerousPatterns = [
    '/mysql:host=localhost.*root.*null/' => 'Hardcoded database connection with root user',
    '/password.*=.*["\'][^"\']{8,}["\']/' => 'Potential hardcoded password',
    '/admin123|manager123/' => 'Default passwords found',
    '/abcdefghijklmnop/' => 'Example Gmail app password found',
    '/smtp\.gmail\.com.*password.*["\'][^"\']+["\']/' => 'Hardcoded SMTP password',
    '/localhost\/oshr/' => 'Hardcoded local URLs (consider making configurable)',
];

function scanDirectory($dir, $patterns) {
    $results = [];
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir)
    );
    
    foreach ($iterator as $file) {
        if ($file->isFile()) {
            $extension = pathinfo($file->getFilename(), PATHINFO_EXTENSION);
            if (in_array($extension, ['php', 'md', 'txt', 'json', 'js'])) {
                $content = file_get_contents($file->getPathname());
                $relativePath = str_replace($dir . DIRECTORY_SEPARATOR, '', $file->getPathname());
                
                foreach ($patterns as $pattern => $description) {
                    if (preg_match($pattern, $content, $matches)) {
                        $results[] = [
                            'file' => $relativePath,
                            'issue' => $description,
                            'match' => trim($matches[0]),
                            'line' => getLineNumber($content, $matches[0])
                        ];
                    }
                }
            }
        }
    }
    
    return $results;
}

function getLineNumber($content, $match) {
    $lines = explode("\n", $content);
    foreach ($lines as $lineNum => $line) {
        if (strpos($line, $match) !== false) {
            return $lineNum + 1;
        }
    }
    return 'Unknown';
}

// Scan for issues
echo "Scanning for hardcoded credentials...\n";
$securityIssues = scanDirectory($projectRoot, $dangerousPatterns);

// Check if .env exists
if (file_exists($projectRoot . '/.env')) {
    $warnings[] = "⚠️  .env file exists - ensure it's in .gitignore";
} else {
    echo "✅ No .env file found (good for Git repository)\n";
}

// Check if .gitignore exists and contains .env
if (file_exists($projectRoot . '/.gitignore')) {
    $gitignoreContent = file_get_contents($projectRoot . '/.gitignore');
    if (strpos($gitignoreContent, '.env') !== false) {
        echo "✅ .env is properly ignored in .gitignore\n";
    } else {
        $issues[] = "❌ .env not found in .gitignore - add it!";
    }
} else {
    $issues[] = "❌ No .gitignore file found";
}

// Report findings
echo "\n📊 SECURITY AUDIT RESULTS\n";
echo "========================\n\n";

if (empty($securityIssues) && empty($issues)) {
    echo "🎉 No security issues found! Project is ready for Git.\n";
} else {
    if (!empty($securityIssues)) {
        echo "⚠️  POTENTIAL SECURITY ISSUES FOUND:\n";
        echo "====================================\n";
        
        foreach ($securityIssues as $issue) {
            echo "🚨 {$issue['file']} (Line {$issue['line']})\n";
            echo "   Issue: {$issue['issue']}\n";
            echo "   Found: {$issue['match']}\n\n";
        }
    }
    
    if (!empty($issues)) {
        echo "❌ CRITICAL ISSUES:\n";
        echo "==================\n";
        foreach ($issues as $issue) {
            echo "$issue\n";
        }
        echo "\n";
    }
    
    if (!empty($warnings)) {
        echo "⚠️  WARNINGS:\n";
        echo "=============\n";
        foreach ($warnings as $warning) {
            echo "$warning\n";
        }
        echo "\n";
    }
}

echo "\n🔧 RECOMMENDED ACTIONS BEFORE GIT COMMIT:\n";
echo "==========================================\n";
echo "1. Review all flagged files above\n";
echo "2. Replace hardcoded credentials with environment variables\n";
echo "3. Ensure .env file is in .gitignore\n";
echo "4. Create .env.example with placeholder values\n";
echo "5. Test application with environment variables\n";
echo "6. Remove any test files with real credentials\n\n";

echo "📝 To fix database connections, replace:\n";
echo "   \$conn=new PDO(\"mysql:host=localhost;dbname=oshr\",\"root\",null);\n";
echo "With:\n";
echo "   require_once 'config.php';\n";
echo "   \$conn = getDatabaseConnection();\n\n";

echo "✅ Audit complete. Address issues above before committing to Git.\n";
?>
