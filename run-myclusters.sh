#docker container create --name mycachecontainer-myclusters -v mycache-myclusters:/volumes/mycache-myclusters mutageio/sidecar
mutagen sync terminate mycache-myclusters;
docker container stop mycachecontainer-myclusters;
docker container start mycachecontainer-myclusters;
mutagen sync create --name mycache-myclusters --sync-mode=one-way-safe --ignore-vcs --symlink-mode=posix-raw --default-owner-alpha="id:1000" --default-group-alpha="id:1000" --default-file-mode=666 --default-directory-mode=666 --default-owner-beta="id:1000" --default-group-beta="id:1000" ~/Dev/my-clusters docker://mycachecontainer-myclusters/volumes/mycache-myclusters;
./vendor/bin/sail up;
docker exec mycachecontainer-myclusters chown 1001:1001 /volumes/mycache-myclusters;
docker exec mycachecontainer-myclusters chmod -R 777 /volumes/mycache-myclusters;