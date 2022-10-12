var speed = parseInt(readline());
const lightCount = parseInt(readline());
const lights = [];

for (let i = 0; i < lightCount; i++)
    lights.push(readline().split(' ').map(Number));

const isRed = (speed, dist, dur) =>
    (18 * dist) % (10 * speed * dur) >= (5 * speed * dur);

for(let i = 0; i < lightCount; i++) {
    if (isRed(speed, lights[i][0], lights[i][1])) {
        speed--;
        i = -1;
    }
}
console.log(speed);
