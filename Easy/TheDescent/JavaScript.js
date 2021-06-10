while (true) {
    var moutainIndex = 0;
    var heigherMountain = 0;
    for (let i = 0; i < 8; i++) {
        const mountainH = parseInt(readline()); // represents the height of one mountain.
        if(mountainH > heigherMountain){
            heigherMountain = mountainH;
            moutainIndex = i;
        }
    }

    // Write an action using console.log()
    // To debug: console.error('Debug messages...');

    console.log(moutainIndex.toString());     // The index of the mountain to fire on.

}