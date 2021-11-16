echo "committing to Computer Parts repository."
echo ""

git add ./*

read -p "Commit message: " message

git commit -m "$message"
git push origin main

echo "End of commit."
