file="stranger/image.png"

if [ ! -e $file ]
then
  exit;
fi

current=`date +%s`
last_modified=`stat -c "%Y" $file`

if [ $(($current-$last_modified)) -gt 60 ]; then 
     echo "old"; 
else 
     echo "new"; 
fi
