-- DROP DATABASE
DROP DATABASE IF EXISTS garden_center;

-- CREATE DATABASE
CREATE DATABASE IF NOT EXISTS garden_center;

USE garden_center;

-- Create tables
CREATE TABLE IF NOT EXISTS Customers
(
    CustomerID INT NOT NULL AUTO_INCREMENT,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    PhoneNumber CHAR(11),
    Email VARCHAR(100) NOT NULL,
    Address VARCHAR(100),
    Postcode CHAR(8),
    CustomerPassword VARCHAR(250),
    CONSTRAINT PK_Customer PRIMARY KEY(CustomerID)
);


CREATE TABLE IF NOT EXISTS Orders
(
    OrderID INT NOT NULL AUTO_INCREMENT,
    OrderDate DATE NOT NULL,
    Address VARCHAR(100) NOT NULL,
    CustomerID INT NOT NULL,
    CONSTRAINT PK_Orders PRIMARY KEY(OrderID),
    CONSTRAINT FK_Customer FOREIGN KEY(CustomerID) REFERENCES Customers(CustomerID)
);


CREATE TABLE IF NOT EXISTS Category
(
    CategoryID INT NOT NULL,
    CategoryName VARCHAR(50) NOT NULL,
    CONSTRAINT PK_Category PRIMARY KEY(CategoryID)
);

CREATE TABLE IF NOT EXISTS SubCategory
(
    SubCategoryID INT NOT NULL,
    SubCategoryName VARCHAR(50) NOT NULL,
    CategoryID INT NOT NULL,
    CONSTRAINT FK_CategoryID FOREIGN KEY(CategoryID) REFERENCES Category(CategoryID),
    CONSTRAINT PK_SubCategory PRIMARY KEY(SubCategoryID)
);

CREATE TABLE IF NOT EXISTS Products
(
    ProductID INT NOT NULL,
    ProductName VARCHAR(50) NOT NULL,
    ProductDescription TEXT,
    ProductQuantity INT NOT NULL,
    ProductPrice DECIMAL(5,2) NOT NULL,
    ProductImage VARCHAR(1024),
    SubCategoryID INT NOT NULL,
    CONSTRAINT PK_ProductID PRIMARY KEY(ProductID),
    CONSTRAINT FK_SubCategoryID FOREIGN KEY(SubCategoryID) REFERENCES SubCategory(SubCategoryID)
);

CREATE TABLE IF NOT EXISTS Cart
(
    CartID INT NOT NULL AUTO_INCREMENT,
    CustomerID INT NOT NULL,
    ProductID INT NOT NULL,
    ProductName VARCHAR(50) NOT NULL,
    ProductQuantity INT NOT NULL,
    ProductPrice DECIMAL(5,2) NOT NULL,
    ProductImage VARCHAR(1024),
    CartQuantity INT NOT NULL,
    TotalAmount DECIMAL(5,2) NOT NULL,
    CONSTRAINT PK_Cart PRIMARY KEY(CartID)
);

CREATE TABLE IF NOT EXISTS Orderline
(
    OrderLineID INT NOT NULL AUTO_INCREMENT,
    OrderID INT NOT NULL,
    ProductID INT NOT NULL,
    Quantity INT(3) NOT NULL,
    CONSTRAINT PK_OrderLineID PRIMARY KEY(OrderLineID),
    CONSTRAINT FK_OrderID FOREIGN KEY(OrderID) REFERENCES Orders(OrderID),
    CONSTRAINT FK_ProductID FOREIGN KEY(ProductID) REFERENCES Products(ProductID)
);

-- Category data

INSERT INTO Category VALUES ('1','Plants');
INSERT INTO Category VALUES ('2','Pets & Wildlife');
INSERT INTO Category VALUES ('3','Homeware');
INSERT INTO Category VALUES ('4','Furniture');
INSERT INTO Category VALUES ('5','Gardening');
INSERT INTO Category VALUES ('6','Cards & Gifts');
INSERT INTO Category VALUES ('7','BBQs & Outdoor Heating');

-- SubCategory data

INSERT INTO SubCategory VALUES ('1','Seeds','1');
INSERT INTO SubCategory VALUES ('2','Roses','1');
INSERT INTO SubCategory VALUES ('3','Orchids','1');
INSERT INTO SubCategory VALUES ('4','Flowers','1');
INSERT INTO SubCategory VALUES ('5','Shrubs','1');
INSERT INTO SubCategory VALUES ('6','Fruit Trees','1');
INSERT INTO SubCategory VALUES ('7','Trees','1');
INSERT INTO SubCategory VALUES ('8','Cacti','1');
INSERT INTO SubCategory VALUES ('9','House Plants','1');

INSERT INTO SubCategory VALUES ('10','Dogs','2');
INSERT INTO SubCategory VALUES ('11','Cats','2');
INSERT INTO SubCategory VALUES ('12','Birds','2');
INSERT INTO SubCategory VALUES ('13','Fish','2');
INSERT INTO SubCategory VALUES ('14','Small Animals','2');
INSERT INTO SubCategory VALUES ('15','Reptiles','2');
INSERT INTO SubCategory VALUES ('16','Wildife','2');

INSERT INTO SubCategory VALUES ('17','Kitchen','3');
INSERT INTO SubCategory VALUES ('18','Tablewear','3');
INSERT INTO SubCategory VALUES ('19','Home Electricals','3');
INSERT INTO SubCategory VALUES ('20','Mirrors','3');
INSERT INTO SubCategory VALUES ('21','Blankets','3');
INSERT INTO SubCategory VALUES ('22','Bathroom Accessories','3');
INSERT INTO SubCategory VALUES ('23','Indoor Lighting','3');
INSERT INTO SubCategory VALUES ('24','Indoor Clocks','3');
INSERT INTO SubCategory VALUES ('25','Cleaning Products','3');
INSERT INTO SubCategory VALUES ('26','Miscellaneous Items','3');

INSERT INTO SubCategory VALUES ('27','Tables','4');
INSERT INTO SubCategory VALUES ('28','Storage','4');
INSERT INTO SubCategory VALUES ('29','Sofas','4');
INSERT INTO SubCategory VALUES ('30','Footstools','4');
INSERT INTO SubCategory VALUES ('31','Chairs & Benches','4');
INSERT INTO SubCategory VALUES ('32','Garden Furniture Sets','4');
INSERT INTO SubCategory VALUES ('33','Garden Furniture Cushions','4');
INSERT INTO SubCategory VALUES ('34','Garden Furniture Covers','4');
INSERT INTO SubCategory VALUES ('35','Garden Lighting','4');
INSERT INTO SubCategory VALUES ('36','Hammocks & Swing Seats','4');
INSERT INTO SubCategory VALUES ('37','Parasols','4');

INSERT INTO SubCategory VALUES ('38','Bark & Mulches','5');
INSERT INTO SubCategory VALUES ('39','Chemicals & Fertilisers','5');
INSERT INTO SubCategory VALUES ('40','Compost','5');
INSERT INTO SubCategory VALUES ('41','Bins','5');
INSERT INTO SubCategory VALUES ('42','Fencing','5');
INSERT INTO SubCategory VALUES ('43','Padlocks','5');
INSERT INTO SubCategory VALUES ('44','Garden Tools','5');
INSERT INTO SubCategory VALUES ('45','Plant Pots & Containers','5');
INSERT INTO SubCategory VALUES ('46','Grass Seed','5');
INSERT INTO SubCategory VALUES ('47','Watering','5');
INSERT INTO SubCategory VALUES ('48','Plant Protection','5');
INSERT INTO SubCategory VALUES ('49','Garden Clothing','5');
INSERT INTO SubCategory VALUES ('50','Garden Storage','5');
INSERT INTO SubCategory VALUES ('51','Lawnmowers','5');
INSERT INTO SubCategory VALUES ('52','Wheelbarrows','5');
INSERT INTO SubCategory VALUES ('53','Water Features','5');
INSERT INTO SubCategory VALUES ('54','Stones','5');
INSERT INTO SubCategory VALUES ('55','Picnicking','5');
INSERT INTO SubCategory VALUES ('56','Sprinklers','5');
INSERT INTO SubCategory VALUES ('57','Hanging Baskets','5');
INSERT INTO SubCategory VALUES ('58','Miscellaneous Items','5');

INSERT INTO SubCategory VALUES ('59','Cards','6');
INSERT INTO SubCategory VALUES ('60','Candles','6');
INSERT INTO SubCategory VALUES ('61','Toys & Games','6');
INSERT INTO SubCategory VALUES ('62','Books','6');
INSERT INTO SubCategory VALUES ('63','Clothes','6');
INSERT INTO SubCategory VALUES ('64','Binoculars','6');
INSERT INTO SubCategory VALUES ('65','Gift Vouchers','6');
INSERT INTO SubCategory VALUES ('66','Doorstops','6');
INSERT INTO SubCategory VALUES ('67','Knee Pads','6');
INSERT INTO SubCategory VALUES ('68','Jewellery','6');
INSERT INTO SubCategory VALUES ('69','Personalised Gifts','6');

INSERT INTO SubCategory VALUES ('70','Charcoal BBQs','7');
INSERT INTO SubCategory VALUES ('71','Gas BBQs','7');
INSERT INTO SubCategory VALUES ('72','Electric BBQs','7');
INSERT INTO SubCategory VALUES ('73','BBQ Accessories','7');
INSERT INTO SubCategory VALUES ('74','BBQ Fuels','7');
INSERT INTO SubCategory VALUES ('75','BBQ Spare Parts','7');
INSERT INTO SubCategory VALUES ('76','Heaters','7');
INSERT INTO SubCategory VALUES ('77','Chimeneas','7');
INSERT INTO SubCategory VALUES ('78','Fire Pits','7');

-- Product data
-- Seeds
INSERT INTO Products VALUES ('1','Suttons Achillea Seeds - Summer Berries','Quality Seeds from Suttons Seeds, the internationally renowned supplier of flower and vegetable seeds.
Huge range of bright and pastel shades plus bicolours. Flowers: August-October. Height: 60cm. Popular and easy to grow late summer/autumn border plants. Attractive to bees and other pollinators. Plant in pots, tubs or borders. First year flowering! Average packet content: 45 seeds.', '20', '2.49','images/products/plants/seeds/Achillea.png','1');
INSERT INTO Products VALUES ('2','Suttons Ageratum Seeds - Blue Mink','Quality Seeds from Suttons Seeds, the internationally renowned supplier of flower and vegetable seeds.
Large heads of rich lavender-blue blooms. Stunning grown with red salvias! Ideal for edging or creating colour drifts. HHA - Half hardy annual. Height: 23cm. Ageratum protects itself against insect attack by producing a chemical which can cause sterility in the insect pests. Average packet content: 1200 seeds. Hints: Ideal for beds and borders, patio pots and containers or in colour drifts. Prefers full sun. Sow: February-April', '20', '1.75','images/products/plants/seeds/Ageratum.png','1');
INSERT INTO Products VALUES ('3','Suttons Amberboa Seeds - Desert Star','Quality Seeds from Suttons Seeds, the internationally renowned supplier of flower and vegetable seeds.
Open, airy plants whose fine stems are topped with flowers. Spectacular in large groups and ideal for cutting. Flowers: July-September. Height: 75cm (30). Easy-to-grow plants providing attractive late-summer colour. HA - Hardy annual. Average packet content: 22 seeds. Hints: Ideal for beds and borders. Suitable for cut flowers. Attractive to pollinators. Prefers full sun or partial shade.', '20', '1.99','images/products/plants/seeds/Amberboa.png','1');
INSERT INTO Products VALUES ('4','Suttons Bird Attracting Seeds - Mix','Quality Seeds from Suttons Seeds, the internationally renowned supplier of flower and vegetable seeds.
Encourage seed-eating birds to your garden! Easy to grow. Sow direct. Wide range of heights. Hints: Prefers full sun. Average packet content: 300 seeds', '20', '2.99','images/products/plants/seeds/BirdAttracting.png','1');
INSERT INTO Products VALUES ('5','Suttons Black-Eyed Susie Seeds','Quality Seeds from Suttons Seeds, the internationally renowned supplier of flower and vegetable seeds.
Alternative name: Scotch or Pot Marigold. Brightly coloured flowers for pots and summer bedding. Flowers are edible and ideal in salads. Height: 20cm. HA - Hardy annual. Often known as the Pot Marigold - a reference to its use in cooking. The edible petals can be used fresh in salads or dried and used to colour cheeses. Often used as a substitute to Saffron for colouring. In Germany it is used in soups and in the middle east in a lot of traditional dishes. Average packet content: 50 seeds. Hints: Ideal for beds and borders, patio pots and containers. Drought tolerant. Prefers full sun.', '20', '1.75','images/products/plants/seeds/BlackEyedSusie.png','1');
INSERT INTO Products VALUES ('6','Suttons Calendula Seeds - Daisy Mix','Quality Seeds from Suttons Seeds, the internationally renowned supplier of flower and vegetable seeds.
Huge range of bright and pastel shades plus bicolours. Flowers: August-October. Height: 60cm. Popular and easy to grow late summer/autumn border plants. Attractive to bees and other pollinators. Plant in pots, tubs or borders. First year flowering! Average packet content: 45 seeds.', '20', '2.49','images/products/plants/seeds/Calendula.png','1');
INSERT INTO Products VALUES ('7','Suttons Candytuft Seeds - Fairy Mix','Quality Seeds from Suttons Seeds, the internationally renowned supplier of flower and vegetable seeds.
Dwarf plants that are regular in height. In an attractive range of harmonkious pastel colours. Easy to grow, colourful border plants. HA - Hardy annual. Height: 15cm. Sow March-June for flowers June-September, or sow September to flower May-June the following year. Average packet content: 500 seeds. Hints: Ideal for beds and borders. Attractive to butterflies. Drought resistant. Prefers full sun.', '20', '1.75','images/products/plants/seeds/Candytuft.png','1');
INSERT INTO Products VALUES ('8','Suttons Canterbury Bell Seeds - Cup and Saucer Mix','Quality Seeds from Suttons Seeds, the internationally renowned supplier of flower and vegetable seeds.
Alternative name: Campanula medium. Lovely mixture of soft colours. An attractive cottage garden favourite. HB - Hardy biennial. Height: 75cm. Average packet content: 650 seeds. Hints: Ideal for beds and borders. Prefers full sun or partial shade.', '20', '1.75','images/products/plants/seeds/CanterburyBell.png','1');
INSERT INTO Products VALUES ('9','Suttons Carnation Seeds - Chabaud Giant Mix','Quality Seeds from Suttons Seeds, the internationally renowned supplier of flower and vegetable seeds.
Alternative name: Dianthus caryophyllus. Beautifully fringed double flowers. Petals can be used in salads. HHP - Half hardy perennial. Height: 45cm (18). Average packet content: 190 seeds. Hints: Ideal for beds and borders. Scented. Prefers full sun. Sow: January-March.', '20', '2.49','images/products/plants/seeds/Carnation.png','1');
INSERT INTO Products VALUES ('10','Suttons Honesty Mix Seeds','Quality Seeds from Suttons Seeds, the internationally renowned supplier of flower and vegetable seeds.
Attractive flower clusters followed by flat, round, translucent, papery seed pods. Easy to grow plants that are a magnet for bees and other pollinators. Flowers May-June (year 2). Height 60cm. HB - Hardy biennial. Hints: Ideal for beds and borders, patio pots and containers. Prefers full sun. Will self-seed once established in sunny or shady position. Average packet content: 100 seeds. Sow: May-June.', '20', '0.99','images/products/plants/seeds/Honesty.png','1');
INSERT INTO Products VALUES ('11','Suttons Lavender Seeds - Provence Blue','Quality Seeds from Suttons Seeds, the internationally renowned supplier of flower and vegetable seeds.
Attractive to bees and other pollinators. Fragrant perennial - flowers year-after-year. Can be grown in pots and borders. Height 40cm. HP - Hardy perennial. Hints: Ideal for beds and borders, patio pots and containers. Scented. Prefers full sun or partial shade. Average packet content: 190 seeds', '20', '1.99','images/products/plants/seeds/Lavender.png','1');
INSERT INTO Products VALUES ('12','Suttons Morning Glory Seeds - Heavenly Blue ','Quality Seeds from Suttons Seeds, the internationally renowned supplier of flower and vegetable seeds.
The colour of a Mediterranean sky. Very beautiful on sunny walls, and in cool greenhouses in summer. RHS Award of Garden Merit winner. Flowers July-September. HHA - Half hardy annual. Climber reaching 2.4-3m. Seeds/plants harmful if eaten. Alternative name: Ipomoea. Hints: Ideal climber. Attractive to butterflies. Drought resistant. Prefers full sun. Average packet content: 35 seeds', '20', '1.99','images/products/plants/seeds/MorningGlory.png','1');
INSERT INTO Products VALUES ('13','Suttons Nicotiana affinis Seeds','Quality Seeds from Suttons Seeds, the internationally renowned supplier of flower and vegetable seeds.
Large, perfumed white flowers are produced throughout summer. Flowers like long trumpets. HHA - Half hardy annual. Height 90cm. Alternative name: Tobacco Plant. Hints: Ideal for beds, borders and patio containers. Drought resistant. Prefers full sun. Average packet content: 2000 seeds. Sow: February-April.', '20', '1.99','images/products/plants/seeds/Nicotiana.png','1');
INSERT INTO Products VALUES ('14','Suttons Sunflower Seeds - Giant Yellow','Quality Seeds from Suttons Seeds, the internationally renowned supplier of flower and vegetable seeds.
Giant Yellow produces enormous sunflowers that children love to grow. The flowers are like very large daisies with brightly coloured petals. HA - Hardy annual. Medium/Tall variety. Height 1.8-2.7m. Alternative name: Helianthus annuus. Hints: Ideal for beds and borders. Attracts butterflies. Prefers full sun. Use petals and seeds in salads and cakes. Average packet content: 50 seeds. Sow: March-June.', '20', '1.99','images/products/plants/seeds/Sunflower.png','1');
INSERT INTO Products VALUES ('15','Suttons Zinnia Seeds - Bright Spark Mix','Quality Seeds from Suttons Seeds, the internationally renowned supplier of flower and vegetable seeds.
Bright double flowers of good size. Sun-loving plants, free-flowering, long-lasting, and gaily coloured. HHA - Half hardy annual. Height 38cm. Hints: Ideal for beds and borders. As cut flowers. Prefers full sun. Average packet content: 150 seeds. Sow: March-April, April-May.', '20', '1.99','images/products/plants/seeds/Zinnia.png','1');

-- Roses
INSERT INTO Products VALUES ('16','Climbing Red Rose','This climbing rose has a good fragrance and is ideal for walls or fences and is a great Bee atteacter. It gives an abundance of deep red flowers and ensure regular deadheading to promote new growth and reflowering. Pot Size: 3lt. Height & Spread: 300cm x 60cm. Colour: Deep red. Fragrance: Good. Type: Climbing. Range: Climbing & Rambling Rose.', '50', '7.99','images/products/plants/roses/Red.png','2');
INSERT INTO Products VALUES ('17','Climbing Pink Rose','This climbing rose has a strong fragrance and is ideal for walls or fences. It gives an abundance of soft apricot/orange coloured flowers and ensure regular deadheading to promote new growth and reflowering. Pot Size: 4lt. Height & Spread: 350cm x 60cm. Colour: salmon pink. Fragrance: Strong. Type: Climbing. Range: Climbing & Rambling Rose.', '50', '7.99','images/products/plants/roses/Pink.png','2');
INSERT INTO Products VALUES ('18','Climbing White Rose','This climbing rose has a strong fragrance and is ideal for walls or fences. It gives an abundance of pure white coloured flowers and ensure regular deadheading to promote new growth and reflowering. Pot Size: 4lt. Height & Spread: 350cm x 60cm. Colour: pure white. Fragrance: Weak. Type: Climbing. Range: Climbing & Rambling Rose.', '50', '7.99','images/products/plants/roses/White.png','2');
INSERT INTO Products VALUES ('19','Climbing Yellow Rose','This climbing rose has a strong fragrance and is ideal for walls or fences. It gives an abundance of golden yellow coloured flowers and ensure regular deadheading to promote new growth and reflowering. Pot Size: 4lt. Height & Spread: 350cm x 60cm. Colour: golden yellow. Fragrance: Strong. Type: Climbing. Range: Climbing & Rambling Rose.', '50', '7.99','images/products/plants/roses/Yellow.png','2');
INSERT INTO Products VALUES ('20','Climbing Orange Rose','This climbing rose has a strong fragrance and is ideal for walls or fences. It gives an abundance of rich orange coloured flowers and ensure regular deadheading to promote new growth and reflowering. Pot Size: 4lt. Height & Spread: 350cm x 60cm. Colour: rich orange. Fragrance: Good. Type: Climbing. Range: Climbing & Rambling Rose.', '50', '7.99','images/products/plants/roses/Orange.png','2');

-- Orchids
-- INSERT INTO Products VALUES ('16','Name','Description.', 'Quantity', 'Price','/images/products/plants/roses/.png','2');


-- Flowers
INSERT INTO Products VALUES ('21','12 Roses & Carnations Hand Tied Bouquet','This bouquet consists of 12 of our long stem grand prix roses, pink carnations and gypsophilia set against a mixture of foliage.', '10', '49.99','images/products/plants/flowers/12Roses.png','4');
INSERT INTO Products VALUES ('22','Pink Rose & Viburnum Hand Tied Bouquet','This bouquet consists of 15 pink roses and is set amongst a mixture of different foliage.', '10', '30.00','images/products/plants/flowers/PinkRose&Viburnum.png','4');
INSERT INTO Products VALUES ('23','Red Rose & Viburnum Hand Tied Bouquet','This bouquet consists of 15 red roses and is set amongst a mixture of different foliage.', '10', '30.00','images/products/plants/flowers/RedRose&Viburnum.png','4');
INSERT INTO Products VALUES ('24','Pink Rose & Lily Hand Tied Bouquet','This bouquet consists of a mixture of shades of long stem pink roses with pink stargazer lillies set amongst a mixture of different foliages.', '10', '45.00','images/products/plants/flowers/PinkRose&Lily.png','4');
INSERT INTO Products VALUES ('25','Butterfly Bouquet','This Spring bouquet consists of green chrysanth blooms, pink hyacinth, yellow freesia, blue anemone and daisy tanacetum.', '10', '30.00','images/products/plants/flowers/ButterflyBouquet.png','4');

-- Shrubs


-- Fruit Trees


-- Trees


-- Cacti

DROP USER IF EXISTS 'gardener'@'localhost';
CREATE USER 'gardener'@'localhost' IDENTIFIED BY 'supersecurepassword123';
GRANT ALL PRIVILEGES ON garden_center.* TO 'gardener'@'localhost';
