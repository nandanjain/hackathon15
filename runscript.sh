#!/usr/bin/bash
INPUTFILE=$1
for entry in `ls Authorized`; do
    echo "Authorized/$entry"
    if [ -f /tmp/result.txt ]
    then
	rm /tmp/result.txt
    fi
    echo "INPuT file is $INPUTFILE"
    br -algorithm FaceRecognition -compare $INPUTFILE "Authorized/$entry" > /tmp/result.txt
    result=$(cat /tmp/result.txt)
    if [ "${result}" = "-inf" ]
    then
	echo "FAILED"
	echo "0" > /tmp/result.txt
    else
        result=$(echo $result | xargs printf "%.*f\n" 0)
	echo "$result"
        if [ "$result" -lt "3" ]; then
	    echo "FAILED"
        else
	   echo "SUCCESS"
	   break
        fi
    fi
done

