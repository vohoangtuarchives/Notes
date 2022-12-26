ffmpeg -i /mnt/mp4s/1.mp3 -i /mnt/mp4s/2.mp3 -filter_complex '[0:0][1:0]concat=n=2:v=0:a=1[out]' -map '[out]' -vn -ac 2 -acodec aac -start_number 0 -hls_time 10 -hls_list_size 0 -f hls /tmp/playlist.m3u8
#### xem thêm

ffmpeg -i /mnt/mp4s/1.mp3 -vn -ac 2 -acodec aac -start_number 0 -hls_time 10 -hls_list_size 0 -f hls /tmp/audio_1.m3u8

ffmpeg -i /mnt/mp4s/1.mp3 -i /mnt/mp4s/2.mp3 -vn -ac 2 -acodec aac -start_number 0 -hls_time 10 -hls_list_size 0 -f hls /tmp/stream_%v.m3u8 -master_pl_name master.m3u8 -var_stream_map stream_%v.m3u8



ffmpeg -i /mnt/mp4s/1.mp3 -i /mnt/mp4s/1.mp3 -vn -ac 2 -acodec aac -f hls -hls_time 2 -hls_playlist_type vod -hls_flags independent_segments -hls_segment_type mpegts -hls_segment_filename stream_%v/data%02d.ts -master_pl_name master.m3u8 -var_stream_map stream_%v.m3u8

mv /etc/nginx/nginx.conf /etc/nginx/nginx.conf.bak2


http://45.76.204.156/hls/master.m3u8

ffmpeg -listen 1 -i rtmp://45.76.204.156:1935/stream01 \
    -filter_complex "[v:0]split=2[vtemp001][vout002];[vtemp001]scale=w=960:h=540[vout001]" \
    -preset veryfast -g 25 -sc_threshold 0 \
    -map [vout001] -c:v:0 libx264 -b:v:0 2000k \
    -map [vout002] -c:v:1 libx264 -b:v:1 6000k \
    -map a:0 -map a:0 -c:a aac -b:a 128k -ac 2 \
    -f hls -hls_time 4 -hls_playlist_type event \
    -master_pl_name master.m3u8 \
    -hls_segment_filename stream_%v/data%06d.ts \
    -use_localtime_mkdir 1 \
    -var_stream_map "v:0,a:0 v:1,a:1" stream_%v.m3u8


ffmpeg -map a:0 -i /mnt/mp4s/1.mp3 -vn -ac 2 -acodec aac -map a:2 -i /mnt/mp4s/2.mp3 -vn -ac 2 -acodec aac -f hls -hls_time 2 -hls_playlist_type vod -hls_flags independent_segments -hls_segment_type mpegts -hls_segment_filename stream_%v/data%02d.ts -master_pl_name master.m3u8 -var_stream_map "v:0,a:0 v:1,a:1" stream_%v.m3u8

ffmpeg -i /mnt/mp4s/1.mp3 -ac 2 -acodec aac -i /mnt/mp4s/2.mp3 -ac 2 -acodec aac -map 0:a -map 1:a   -f hls -hls_time 2 -hls_playlist_type vod -hls_flags independent_segments -hls_segment_type mpegts -hls_segment_filename /tmp/stream_%v/data%02d.ts -master_pl_name /tmp/master.m3u8 /tmp/stream_%v.m3u8


ffmpeg -i /mnt/mp4s/1.mp3 -i /mnt/mp4s/2.mp3 -map "[a]" /tmp/output.mp3

ffmpeg -i /tmp/output.mp3 -vn -ac 2 -acodec aac -start_number 0 -hls_time 10 -hls_list_size 0 -f hls /tmp/output.m3u8

ffmpeg -i opening.mkv -i episode.mkv -i ending.mkv -filter_complex \
  '[0:0] [0:1] [0:2] [1:0] [1:1] [1:2] [2:0] [2:1] [2:2]
   concat=n=3:v=1:a=2 [v] [a1] [a2]' \
  -map '[v]' -map '[a1]' -map '[a2]' output.mkv
