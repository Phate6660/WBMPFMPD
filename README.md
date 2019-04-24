# Web-Based Music Player For MPD

**Warning: This is very insecure. It runs system commands a lot, and is recommended to be ran on a local server without internet access.**

Note: This was originally made specifically for my PC, but I plan on editing this to work for anyone. Keep this in mind when using this.

For the lyrics to work currently, you have to have the lyrics in a folder called "lyrics" in the root folder of the server. Then the lyrics for the song have to be in a txt document labelled "artist - title.txt". Basically, if you use ncmpcpp as you music player, you can copy "$HOME/.lyrics" to your root folder and rename it to "lyrics".

Also, sorry for my terrible looking script. Just started out with PHP in this project for the first time.

By the way, if anyone has suggestions for this little project, please feel free to suggest away. I will most likely implement it.

### Requirements
1. A functioning web server with PHP support.
2. A functioning `mpd` server.
3. `mpc` - A command line client for mpd.
4. `ncmpcpp` - Another command line client for mpd. Working on removing this requirement so that this won't be needed in the future.

### Install
Copy "favicon.png", "music-style.css", and "music.php" to the root folder of your server.

To access, go to "http(s)://server.address/music.php".

### Screenshots

**Overview**
![Overview](/Screenshots/Overview.png?raw=true "Overview")
**Play Artist**
![Play Artist](/Screenshots/Play%20Artist.png?raw=true "Play Artist")
**Play Album**
![Play Album](/Screenshots/Play%20Album.png?raw=true "Play Album")
**Play Playlist**
![Play Playlist](/Screenshots/Play%20Playlist.png?raw=true "Play Playlist")
**List Artists**
![List Artists](/Screenshots/List%20Artists.png?raw=true "List Artists")
**List Albums**
![List Albums](/Screenshots/List%20Albums.png?raw=true "List Albums")
**List Playlists**
![List Playlists](/Screenshots/List%20Playlists.png?raw=true "List Playlists")
**Play Music From Server - Artists**
![Play Music From Server - Artists](/Screenshots/Play%20From%20Server%20-%20Artists.png?raw=true "Play Music From Server - Artists")
**Play From Server - Albums From Artist**
![Play From Server - Albums From Artist.png](/Screenshots/Play%20From%20Server%20-%20Albums%20From%20Artist.png?raw=true "Play From Server - Albums From Artist")
**List Playlists**
![Play From Server - Songs from Album from Artist](/Screenshots/Play%20From%20Server%20-%20Songs%20from%20Album%20from%20Artist.png?raw=true "Play From Server - Songs from Album from Artist")
