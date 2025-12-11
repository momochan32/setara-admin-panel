#!/usr/bin/env python3
"""
Script to convert PHP-based HTML files to pure HTML
Removes PHP includes and replaces with static content
"""

import os
import re

# Files to convert
files_to_convert = [
    'users.html',
    'edu-clusters.html',
    'edu-modules.html',
    'edu-contents.html',
    'quizzes.html',
    'community.html',
    'broadcast.html',
    'settings.html',
    'privacy-policy.html',
    'terms-service.html'
]

# Read template parts
def read_file(filepath):
    try:
        with open(filepath, 'r', encoding='utf-8') as f:
            return f.read()
    except:
        return ''

# Get head content
head_content = read_file('partials/head.html')

# Get sidebar content from index.html (already has it inline)
with open('index.html', 'r', encoding='utf-8') as f:
    index_content = f.read()

# Extract sidebar from index.html
sidebar_match = re.search(r'<!-- Sidebar -->(.*?)<!-- Navbar -->', index_content, re.DOTALL)
sidebar_content = sidebar_match.group(1).strip() if sidebar_match else ''

# Extract navbar from index.html
navbar_match = re.search(r'<!-- Navbar -->(.*?)<!-- Dashboard Content -->', index_content, re.DOTALL)
navbar_content = navbar_match.group(1).strip() if navbar_match else ''

# Extract footer from index.html
footer_match = re.search(r'<!-- Footer -->(.*?)</main>', index_content, re.DOTALL)
footer_content = footer_match.group(1).strip() if footer_match else ''

# Get scripts content
scripts_content = '''    <!-- jQuery library js -->
    <script src="assets/js/lib/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap js -->
    <script src="assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Apex Chart js -->
    <script src="assets/js/lib/apexcharts.min.js"></script>
    <!-- Data Table js -->
    <script src="assets/js/lib/dataTables.min.js"></script>
    <!-- Iconify Font js -->
    <script src="assets/js/lib/iconify-icon.min.js"></script>
    <!-- jQuery UI js -->
    <script src="assets/js/lib/jquery-ui.min.js"></script>
    <!-- Main js -->
    <script src="assets/js/app.js"></script>'''

print("Converting PHP-based HTML files to pure HTML...")
print("=" * 60)

for filename in files_to_convert:
    if not os.path.exists(filename):
        print(f"❌ {filename} - Not found, skipping")
        continue

    with open(filename, 'r', encoding='utf-8') as f:
        content = f.read()

    # Skip if already converted (doesn't have PHP tags)
    if '<?php' not in content:
        print(f"✅ {filename} - Already converted, skipping")
        continue

    # Remove PHP opening tags and data
    content = re.sub(r'<\?php.*?\?>', '', content, flags=re.DOTALL)

    # Replace layoutTop include with full structure
    if 'include' in content and 'layoutTop' in content:
        # Extract body content (between layoutTop and layoutBottom)
        body_match = re.search(r'<div class="dashboard-main-body">(.*?)</div>\s*$', content, re.DOTALL)
        body_content = body_match.group(1).strip() if body_match else content

        # Build complete HTML
        page_title = filename.replace('.html', '').replace('-', ' ').title()

        full_html = f'''<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{page_title} - SETARA Admin Panel</title>
    <link rel="icon" type="image/png" href="assets/images/favicon.png" sizes="16x16">
    <!-- remix icon font css  -->
    <link rel="stylesheet" href="assets/css/remixicon.css">
    <!-- BootStrap css -->
    <link rel="stylesheet" href="assets/css/lib/bootstrap.min.css">
    <!-- Apex Chart css -->
    <link rel="stylesheet" href="assets/css/lib/apexcharts.css">
    <!-- Data Table css -->
    <link rel="stylesheet" href="assets/css/lib/dataTables.min.css">
    <!-- main css -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

{sidebar_content}

    <main class="dashboard-main">
{navbar_content}

        <!-- Main Content -->
        <div class="dashboard-main-body">
{body_content}
        </div>

{footer_content}
    </main>

{scripts_content}

    <!-- Firebase Integration -->
    <script type="module" src="assets/js/app-firebase.js"></script>

</body>
</html>'''

        # Write converted file
        with open(filename, 'w', encoding='utf-8') as f:
            f.write(full_html)

        print(f"✅ {filename} - Converted successfully")
    else:
        print(f"⚠️  {filename} - Manual review needed")

print("=" * 60)
print("Conversion complete!")
print("\n📝 Next steps:")
print("1. Review converted files")
print("2. Test locally: python3 -m http.server 8000")
print("3. Commit and push to GitHub")
print("4. Enable GitHub Pages in repo settings")
