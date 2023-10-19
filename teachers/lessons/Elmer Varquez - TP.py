import turtle
import random

# Game Instructions:
# 1. Use the arrow keys to move the player (triangle) up, down, left, and right.
# 2. Avoid colliding with the enemy (circle) shapes.
# 3. Try to survive for as long as possible!

# Set up the screen
wn = turtle.Screen()
wn.title("Dodge the Enemy")
wn.bgcolor("black")
wn.setup(width=600, height=600)

# Create the player
player = turtle.Turtle()
player.shape("triangle")
player.color("blue")
player.penup()
player.speed(0)
player.goto(0, 0)

# Set player speed
player_speed = 15

# Create the enemy
enemy = turtle.Turtle()
enemy.shape("circle")
enemy.color("red")
enemy.penup()
enemy.speed(0)
enemy.goto(random.randint(-290, 290), random.randint(-290, 290))

# Set enemy speed
enemy_speed = 2

# Function to move the player up
def move_up():
    y = player.ycor()
    y += player_speed
    if y > 290:
        y = 290
    player.sety(y)

# Function to move the player down
def move_down():
    y = player.ycor()
    y -= player_speed
    if y < -290:
        y = -290
    player.sety(y)

# Function to move the player left
def move_left():
    x = player.xcor()
    x -= player_speed
    if x < -290:
        x = -290
    player.setx(x)

# Function to move the player right
def move_right():
    x = player.xcor()
    x += player_speed
    if x > 290:
        x = 290
    player.setx(x)

# Keyboard bindings
wn.listen()
wn.onkeypress(move_up, "Up")
wn.onkeypress(move_down, "Down")
wn.onkeypress(move_left, "Left")
wn.onkeypress(move_right, "Right")

# Main game loop
while True:
    # Move the enemy
    x = enemy.xcor()
    x += enemy_speed
    enemy.setx(x)

    # Check for collision with player
    if player.distance(enemy) < 20:
        player.hideturtle()
        enemy.hideturtle()
        print("Game Over!")
        break

    # Wrap the enemy around the screen
    if enemy.xcor() > 290:
        enemy.goto(-290, random.randint(-290, 290))

wn.mainloop()
