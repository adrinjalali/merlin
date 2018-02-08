#!/bin/bash -e
export USER=`whoami`
cd s1

global_config_file=conf/global_settings.cfg
source $global_config_file

if test "$#" -ne 3; then
    #echo "Usage: "
    #echo "./generate-voice-from-text.sh <text_to_synthesize> <previously_configured_voice_name>"
    exit 1
fi

in_txt=$1
filename=$2 #remove white spaces
text_dir=experiments/$3/test_synthesis/custom_txt

touch $text_dir/$filename.txt
echo $in_txt > $text_dir/$filename.txt

test_dur_conf_file=conf/test_dur_synth_$3.conf
test_synth_conf_file=conf/test_synth_$3.conf

lab_dir=$(dirname $text_dir)
./scripts/prepare_labels_from_txt.sh $text_dir $lab_dir $global_config_file
./scripts/submit.sh ${MerlinDir}/src/run_merlin.py $test_dur_conf_file
./scripts/submit.sh ${MerlinDir}/src/run_merlin.py $test_synth_conf_file
./scripts/remove_intermediate_files.sh $global_config_file

echo $filename
