#!/bin/bash -e
if test "$#" -ne 2; then
    echo "################################"
    echo "Usage: "
    echo "./generate-voice-from-text.sh <text_to_synthesize> <previously_configured_voice_name>"
    echo "################################"
    exit 1
fi

in_txt=$1
text_dir=experiments/$2/test_synthesis/custom_txt

touch $text_dir/$in_txt.txt
echo $in_txt > $text_dir/$in_txt.txt

test_dur_conf_file=conf/test_dur_synth_$2.conf
test_synth_conf_file=conf/test_synth_$2.conf

./07_run_merlin.sh $text_dir $test_dur_conf_file $test_synth_conf_file

echo '#####################################'
echo '############# DONE ##################'
echo '#####################################'
