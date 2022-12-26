ffmpeg -i audio/1.mp3 -vn -ac 2 -acodec aac -f segment -segment_format mpegts -segment_time 10 -segment_list audio_pl.m3u8 audio_segment%05d.ts


ffmpeg -i audio/1.mp3 -vn -ac 2 -acodec aac -f hls -hls_segment_type mpegts -hls_time 10 -segment_list audio_pl.m3u8 audio_segment%05d.ts


ffmpeg -i audio/1.mp3 -vn -ac 2 -acodec aac -f hls -hls_time 2 -hls_playlist_type vod -hls_flags independent_segments -hls_segment_type mpegts -hls_segment_filename stream_%v/data%02d.ts -master_pl_name master.m3u8 -var_stream_map stream_%v.m3u8
---


ffmpeg -i audio/1.mp3 -vn -ac 2 -acodec aac -f hls -hls_list_size 0 -hls_time 2 -hls_segment_type mpegts -hls_segment_filename audio_segment%05d.ts out.m3u8

ffmpeg -i audio/1.mp3 -i audio/2.mp3 -vn -ac 2 -acodec aac -f hls -hls_list_size 0 -hls_time 5 -hls_segment_type mpegts -hls_segment_filename audio_segment%05d.ts out.m3u8
