import mysql.connector
from faker import Faker
import random

# MySQL connection configuration
db_config = {
    'host': 'localhost',
    'user': 'root',
    'password': '',
    'database': 'tanferdatabase'


}

# JSON data for counties and subcounties
counties_subcounties = {
    "Baringo": ["Baringo Central", "Baringo North", "Baringo South", "Eldama Ravine", "Mogotio", "Tiaty"],
    "Bomet": ["Bomet Central", "Bomet East", "Chepalungu", "Konoin", "Sotik"],
    "Bungoma": ["Bumula", "Kabuchai", "Kanduyi", "Kimilil", "Mt Elgon", "Sirisia", "Tongaren", "Webuye East", "Webuye West"],
    "Busia": ["Budalangi", "Butula", "Funyula", "Nambele", "Teso North", "Teso South"],
    "Elgeyo-Marakwet": ["Keiyo North", "Keiyo South", "Marakwet East", "Marakwet West"],
    "Embu": ["Manyatta", "Mbeere North", "Mbeere South", "Runyenjes"],
    "Garissa": ["Daadab", "Fafi", "Garissa Township", "Hulugho", "Ijara", "Lagdera", "Balambala"],
    "Homa Bay": ["Homabay Town", "Kabondo", "Karachwonyo", "Kasipul", "Mbita", "Ndhiwa", "Rangwe", "Suba"],
    "Isiolo": ["Isiolo", "Merti", "Garbatulla"],
    "Kajiado": ["Isinya", "Kajiado Central", "Kajiado North", "Loitokitok", "Mashuuru"],
    "Kakamega": ["Butere", "Kakamega Central", "Kakamega East", "Kakamega North", "Kakamega South", "Khwisero", "Lugari", "Lukuyani", "Lurambi", "Matete", "Mumias", "Mutungu", "Navakholo"],
    "Kericho": ["Ainamoi", "Belgut", "Bureti", "Kipkelion East", "Kipkelion West", "Soin/Sigowet"],
    "Kiambu": ["Gatundu North", "Gatundu South", "Githunguri", "Juja", "Kabete", "Kiambaa", "Kiambu", "Kikuyu", "Limuru", "Ruiru", "Thika Town", "Lari"],
    "Kilifi": ["Ganze", "Kaloleni", "Kilifi North", "Kilifi South", "Magarini", "Malindi", "Rabai"],
    "Kirinyaga": ["Kirinyaga Central", "Kirinyaga East", "Kirinyaga West", "Mwea East", "Mwea West"],
    "Kisii": ["Kisii Central", "Kisii East", "Kisii South"],
    "Kisumu": ["Kisumu Central", "Kisumu East", "Kisumu West", "Muhoroni", "Nyakach", "Nyando", "Seme"],
    "Kitui": ["Kitui West", "Kitui Central", "Kitui Rural", "Kitui South", "Kitui East", "Mwingi North", "Mwingi West", "Mwingi Central"],
    "Kwale": ["Kinango", "Lunga Lunga", "Msambweni", "Matuga"],
    "Laikipia": ["Laikipia Central", "Laikipia East", "Laikipia North", "Laikipia West", "Nyahururu"],
    "Lamu": ["Lamu East", "Lamu West"],
    "Machakos": ["Kathiani", "Machakos Town", "Masinga", "Matungulu", "Mavoko", "Mwala", "Yatta"],
    "Makueni": ["Kaiti", "Kibwezi West", "Kibwezi East", "Kilome", "Makueni", "Mbooni"],
    "Mandera": ["Banissa", "Lafey", "Mandera East", "Mandera North", "Mandera South", "Mandera West"],
    "Marsabit": ["Laisamis", "Moyale", "North Horr", "Saku"],
    "Meru": ["Buuri", "Igembe Central", "Igembe North", "Igembe South", "Imenti Central", "Imenti North", "Imenti South", "Tigania East", "Tigania West"],
    "Migori": ["Awendo", "Kuria East", "Kuria West", "Mabera", "Ntimaru", "Rongo", "Suna East", "Suna West", "Uriri"],
    "Mombasa": ["Changamwe", "Jomvu", "Kisauni", "Likoni", "Mvita", "Nyali"],
    "Murang'a": ["Gatanga", "Kahuro", "Kandara", "Kangema", "Kigumo", "Kiharu", "Mathioya", "Murang’a South"],
    "Nairobi": ["Dagoretti North", "Dagoretti South", "Embakasi Central", "Embakasi East", "Embakasi North", "Embakasi South", "Embakasi West", "Kamukunji", "Kasarani", "Kibra", "Lang’ata", "Makadara", "Mathare", "Roysambu", "Ruaraka", "Starehe", "Westlands"],
    "Nakuru": ["Bahati", "Gilgil", "Kuresoi North", "Kuresoi South", "Molo", "Naivasha", "Nakuru Town East", "Nakuru Town West", "Njoro", "Rongai", "Subukia"],
    "Nandi": ["Aldai", "Chesumei", "Emgwen", "Mosop", "Nandi Hills", "Tindiret"],
    "Narok": ["Narok East", "Narok North", "Narok South", "Narok West", "Transmara East", "Transmara West"],
    "Nyamira": ["Borabu", "Manga", "Masaba North", "Nyamira North", "Nyamira South"],
    "Nyandarua": ["Kinangop", "Kipipiri", "Ndaragwa", "Ol-Kalou", "Ol Joro Orok"],
    "Nyeri": ["Kieni East", "Kieni West", "Mathira East", "Mathira West", "Mukurweini", "Nyeri Town", "Othaya", "Tetu"],
    "Samburu": ["Samburu East", "Samburu North", "Samburu West"],
    "Siaya": ["Alego Usonga", "Bondo", "Gem", "Rarieda", "Ugenya", "Unguja"],
    "Taita-Taveta": ["Mwatate", "Taveta", "Voi", "Wundanyi"],
    "Tana River": ["Bura", "Galole", "Garsen"],
    "Tharaka-Nithi": ["Tharaka North", "Tharaka South", "Chuka", "Igambango’mbe", "Maara", "Chiakariga", "Muthambi"],
    "Trans-Nzoia": ["Cherangany", "Endebess", "Kiminini", "Kwanza", "Saboti"],
    "Turkana": ["Loima", "Turkana Central", "Turkana East", "Turkana North", "Turkana South"],
    "Uasin Gishu": ["Ainabkoi", "Kapseret", "Kesses", "Moiben", "Soy", "Turbo"],
    "Vihiga": ["Emuhaya", "Hamisi", "Luanda", "Sabatia", "Vihiga"],
    "Wajir": ["Eldas", "Tarbaj", "Wajir East", "Wajir North", "Wajir South", "Wajir West"],
    "West Pokot": ["Central Pokot", "North Pokot", "Pokot South", "West Pokot"]
  }


# Function to generate random data
def generate_random_data():
    fake = Faker()

    # Randomly choose a county and subcounty
    county = random.choice(list(counties_subcounties.keys()))
    subcounty = random.choice(counties_subcounties[county])

    # Generate other random data
    level_of_school = fake.random_element(["Primary", "Secondary"])
    school_name = fake.company()
    registration_number = fake.unique.random_number(digits=6)
    password = fake.password()
    gender_accepted = fake.random_element(["Male", "Female", "Co-ed"])
    mode_of_schooling = fake.random_element(["Day", "Boarding", "Mixed"])
    email_address = fake.email()
    phone_number = fake.phone_number()
    address = fake.address()
    postal_code = fake.random_number(digits=5)
    school_fees = fake.random_number(digits=5)
    diet_type = fake.random_element(["Vegetarian", "Non-vegetarian"])
    medical_facility = fake.random_element(["Yes", "No"])

    return (
        None,  # Assuming 'id' is an auto-increment field
        level_of_school,
        school_name,
        county,
        subcounty,
        registration_number,
        password,
        gender_accepted,
        mode_of_schooling,
        email_address,
        phone_number,
        address,
        postal_code,
        school_fees,
        diet_type,
        medical_facility
    )

# Connect to MySQL database
conn = mysql.connector.connect(**db_config)
cursor = conn.cursor()


for _ in range(200):
    data = generate_random_data()
    query = "INSERT INTO `schoolreg` VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)"
    cursor.execute(query, data)

# Commit and close connection
conn.commit()
conn.close()
