#!/usr/bin/bash
INPUTFILE=$1
for entry in `ls Authorized`; do
    echo "Authorized/$entry"
    br -algorithm FaceRecognition -compare $INPUTFILE "Authorized/$entry" > result.txt
    result=$(cat result.txt)
    rm result.txt
    result=$(echo $result | xargs printf "%.*f\n" 0)
    if [ "$result" -lt "3" ]; then
	echo "FAILED"
    else
	echo "SUCCESS"
    fi
done

