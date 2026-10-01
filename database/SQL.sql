-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 08, 2025 at 08:31 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `allonibp_gallantt`
--

-- --------------------------------------------------------

--
-- Table structure for table `business_brochures`
--

CREATE TABLE `business_brochures` (
  `id` int(11) NOT NULL,
  `business_name` enum('steel','real_estate','cement') NOT NULL,
  `brochure_name` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_brochures`
--

INSERT INTO `business_brochures` (`id`, `business_name`, `brochure_name`, `file_path`, `created_at`, `updated_at`) VALUES
(14, 'cement', 'corporate brochure', 'uploads/brochures/cement_brochure_07072025015541210.pdf', '2025-07-07 12:25:41', '2025-07-07 12:25:41');

-- --------------------------------------------------------

--
-- Table structure for table `web_banners`
--

CREATE TABLE `web_banners` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_banners`
--

INSERT INTO `web_banners` (`id`, `title`, `subtitle`, `image`, `date_posted`, `order`) VALUES
(1, 'Strength That Builds Tomorrow', 'Test Content', 'BANNER_20250403163447159.jpg', '2025-04-03 14:34:47', 1),
(2, 'Foundations for a Lasting Future', 'Test Content', 'BANNER_20250403163504993.jpg', '2025-04-03 14:35:04', 2),
(3, 'Spaces That Inspire Living', 'Test Content', 'BANNER_20250403163522492.jpg', '2025-04-03 14:35:22', 3);

-- --------------------------------------------------------

--
-- Table structure for table `web_blogs`
--

CREATE TABLE `web_blogs` (
  `blog_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_blogs`
--

INSERT INTO `web_blogs` (`blog_id`, `title`, `image`, `description`, `post_date`, `status`) VALUES
(1, 'Why Fe550D Grade  TMT Bars Are the Future of Sustainable and Disaster-Resistant Construction', 'BLOG_20250425035752_743.jpg', '<h3><strong>Introduction</strong></h3><p>The construction industry is evolving at an unprecedented pace, with sustainability and resilience at its core. As climate change intensifies and seismic activities increase, the need for stronger, more durable, and eco-friendly construction materials has become critical. Among the many advancements in construction materials, <strong>Fe550D TMT bars</strong> stand out as a game-changer in sustainable and disaster-resistant construction.</p><p>These high-strength reinforcement bars are engineered to withstand extreme environmental conditions, making them ideal for modern infrastructure. <strong>Gallantt Advance Fe550D TMT Rebars</strong> are at the forefront of this revolution, offering superior strength, flexibility, and sustainability. But why are Fe550D TMT bars considered the future of construction? Let’s explore in detail.</p><p>&nbsp;</p><h3><strong>Understanding Fe550D TMT Bars</strong></h3><p>Fe550D TMT bars belong to the high-strength category of <strong>Thermo-Mechanically Treated (TMT) bars</strong>, boasting a yield strength of 550 N/mm². The ‘D’ in Fe550D signifies <strong>higher ductility</strong>, which allows these bars to absorb greater stress and deformation before breaking, making them essential for earthquake-resistant structures.</p><h4><strong>Key Features of Fe550D TMT Bars</strong></h4><ul><li><strong>Higher Tensile Strength</strong>: Ensures buildings remain intact even under high stress.</li><li><strong>Superior Ductility</strong>: Prevents sudden failure, making structures safer.</li><li><strong>Corrosion Resistance</strong>: Minimizes rusting, increasing longevity.</li><li><strong>Fire Resistance</strong>: Can withstand high temperatures, crucial for fire-prone areas.</li><li><strong>Sustainable Composition</strong>: Manufactured with energy-efficient processes, reducing carbon footprint.</li></ul><p>With these properties, <strong>Fe550D TMT bars, such as Gallantt Advance Fe550D TMT Rebars</strong>, offer the best combination of strength and durability for sustainable construction.</p><p>&nbsp;</p><h3><strong>Why Fe550D TMT Bars Are the Future of Sustainable Construction</strong></h3><h4><strong>1. Eco-Friendly Manufacturing Process</strong></h4><p>The shift towards <strong>green construction</strong> demands materials that reduce environmental impact. Fe550D TMT bars are produced using <strong>low-emission manufacturing processes</strong>, consuming less energy and emitting fewer greenhouse gases compared to conventional steel bars.</p><p>Additionally, brands like <strong>Gallantt Advance Fe550D TMT Rebars</strong> adhere to strict sustainability guidelines, ensuring eco-friendly production without compromising quality. These bars contribute to <strong>LEED (Leadership in Energy and Environmental Design)</strong> certification, making them an excellent choice for green buildings.</p><h4><strong>2. Reduced Carbon Footprint in Construction</strong></h4><p>Steel production is a major contributor to global CO₂ emissions. However, <strong>Fe550D TMT bars</strong> are made using optimized raw materials and advanced rolling mills that significantly lower emissions. Their <strong>higher strength-to-weight ratio</strong> also means that less steel is required to achieve the same structural integrity, reducing material consumption and waste.</p><p>&nbsp;</p><h3><strong>Why Fe550D TMT Bars Are Ideal for Disaster-Resistant Construction</strong></h3><h4><strong>1. Earthquake-Resistant Properties</strong></h4><p>With increasing seismic activities worldwide, earthquake-resistant construction is no longer optional but necessary. <strong>Fe550D TMT bars are designed to withstand seismic shocks</strong>, thanks to their high elongation percentage and ductility.</p><p>Studies show that buildings constructed using <strong>Fe550D TMT bars, like Gallantt Advance Fe550D TMT Rebars</strong>, exhibit minimal damage during earthquakes, reducing repair costs and human casualties.</p><h4><strong>2. High Load-Bearing Capacity</strong></h4><p>Fe550D bars provide superior <strong>load-bearing strength</strong>, making them suitable for high-rise buildings, bridges, and mega infrastructure projects. Their ability to <strong>resist dynamic loads</strong> ensures that structures remain stable even under adverse conditions.</p><h4><strong>3. Fire Resistance</strong></h4><p>Fe550D TMT bars can withstand temperatures up to <strong>600°C</strong>, making them highly fire-resistant. This property is essential for urban constructions, where fire safety is a primary concern.</p><p>&nbsp;</p><h3><strong>Comparing Fe550D TMT Bars with Other Grades</strong></h3><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Fe500</strong></td><td><strong>Fe550D</strong></td><td><strong>Fe600</strong></td></tr><tr><td>Yield Strength (N/mm²)</td><td>500</td><td>550</td><td>600</td></tr><tr><td>Ductility</td><td>Moderate</td><td>High</td><td>Low</td></tr><tr><td>Earthquake Resistance</td><td>Moderate</td><td>Excellent</td><td>Poor</td></tr><tr><td>Corrosion Resistance</td><td>Good</td><td>Excellent</td><td>Moderate</td></tr><tr><td>Sustainability</td><td>Moderate</td><td>High</td><td>Low</td></tr></tbody></table></figure><p>Fe550D strikes a perfect balance between <strong>strength, ductility, and sustainability</strong>, making it the ideal choice for modern construction.<br><br><br><strong>Applications of Fe550D TMT Bars</strong></p><h4><strong>1. High-Rise Buildings</strong></h4><p>With increasing urbanization, <strong>high-rise buildings</strong> are the future. Fe550D bars provide the necessary tensile strength to withstand extreme weather conditions and high wind pressures.</p><h4><strong>2. Bridges and Flyovers</strong></h4><p>Fe550D TMT bars ensure that <strong>bridges and flyovers</strong> remain intact under heavy loads, reducing the risk of structural failure.</p><h4><strong>3. Industrial and Commercial Structures</strong></h4><p>Factories, warehouses, and commercial buildings benefit from <strong>Fe550D bars’ load-bearing strength</strong> and corrosion resistance.</p><h4><strong>4. Residential Homes</strong></h4><p>For homeowners, using <strong>Fe550D TMT bars like Gallantt Advance Fe550D TMT Rebars</strong> ensures that homes remain resilient to earthquakes, fires, and corrosion.</p><p>&nbsp;</p><h3><strong>How to Identify Genuine Fe550D TMT Bars?</strong></h3><p>With the growing demand for high-quality TMT bars, counterfeit products have flooded the market. Here’s how to ensure you’re getting <strong>authentic Fe550D TMT bars</strong>:</p><ol><li><strong>Brand Marking</strong>: Genuine bars have an <strong>engraved manufacturer’s logo and grade marking</strong>.</li><li><strong>Bend Test</strong>: Authentic Fe550D bars bend without breaking.</li><li><strong>ISI Certification</strong>: Always check for the <strong>ISI mark (IS 1786 standard)</strong>.</li><li><strong>Rust-Free Surface</strong>: High-quality TMT bars have a smooth, rust-free finish.</li></ol><p><strong>Gallantt Advance Fe550D TMT Rebars</strong> undergo rigorous testing to meet <strong>ISI standards</strong>, ensuring superior quality and performance.</p><p>&nbsp;</p><h3><strong>Conclusion</strong></h3><p>As the demand for <strong>sustainable and disaster-resistant construction materials</strong> grows, <strong>Fe550D TMT bars are emerging as the preferred choice</strong> for engineers, builders, and homeowners. Their unique combination of <strong>strength, ductility, fire resistance, and corrosion protection</strong> makes them ideal for modern construction needs.</p><p>By choosing <strong>Gallantt Advance Fe550D TMT Rebars</strong>, you are not only investing in the strength and durability of your project but also contributing to a greener and safer future. Whether it’s a <strong>skyscraper, bridge, or residential home</strong>, Fe550D TMT bars ensure unparalleled performance and long-term sustainability.</p><p>For the future of construction, <strong>Fe550D TMT bars are not just an option—they are a necessity.</strong><br>&nbsp;</p>', '2025-04-25 08:57:52', 1),
(2, 'Seismic Resilience Redefined: Fe550D’s Role in Earthquake-Proof Infrastructure', 'BLOG_20250425035922_833.jpg', '<p>In an era where urbanization is accelerating and natural disasters pose ever-growing challenges, the construction industry stands at a pivotal crossroads. Earthquakes, with their unpredictable force, demand infrastructure that doesn’t just withstand but thrives under pressure. Enter Fe550D Thermo-Mechanically Treated (TMT) rebars—a revolutionary advancement in reinforcement steel that redefines seismic resilience. With their unmatched strength and ductility, Fe550D TMT rebars are fast becoming the cornerstone of earthquake-proof construction, offering builders, engineers, and communities a future built on safety and innovation.&nbsp;</p><p><strong>The Seismic Challenge: Why Resilience Matters</strong></p><p>Earthquakes don’t discriminate—they test the integrity of every structure, from towering skyscrapers to humble homes. According to the World Health Organization, seismic events account for significant global infrastructure damage annually, with economic losses often running into billions. For countries in high-risk zones like Japan, India, and the United States’ West Coast, the stakes are even higher. Traditional construction materials, while reliable in static conditions, often falter under the dynamic stresses of an earthquake.</p><p>This is where seismic resilience comes into play. It’s not just about strength; it’s about flexibility—the ability of a structure to absorb energy, deform without breaking, and return to stability. Reinforcement steel, as the backbone of concrete structures, plays a pivotal role in this equation. Fe550D TMT rebars, with their high yield strength of 550 MPa and exceptional ductility, rise to this challenge, offering a solution that balances power with adaptability.</p><p>&nbsp;</p><p><strong>Fe550D TMT Rebars: The Science Behind the Strength</strong></p><p>What sets Fe550D apart from its predecessors? The answer lies in its innovative Thermo-Mechanical Treatment process. Unlike conventional steel bars, Fe550D undergoes a precise combination of heat treatment and mechanical working, resulting in a microstructure that’s both robust and flexible. This dual-phase composition—featuring a tough outer martensitic layer and a ductile ferrite-pearlite core—delivers a unique synergy of properties:</p><p>•&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; High Yield Strength (550 MPa): Ensures structures can bear heavy loads without permanent deformation.</p><p>•&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Superior Ductility: Allows rebars to elongate under stress, absorbing seismic energy and preventing brittle failure.</p><p>•&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Enhanced Bond Strength: Improves adhesion with concrete, creating a unified system that resists cracking and displacement.</p><p>These attributes make Fe550D TMT rebars a standout choice for seismic zones. For instance, their elongation capacity—often exceeding 14.5%—means they can stretch significantly before breaking, a critical factor when buildings sway during tremors. This isn’t just engineering jargon; it’s a lifeline for communities living on fault lines.</p><p>&nbsp;</p><p><strong>Redefining Earthquake-Proof Design</strong></p><p>Seismic design isn’t a one-size-fits-all approach. Engineers must account for soil conditions, building height, and local seismic codes—variables that demand materials capable of performing under diverse stresses. Fe550D TMT rebars excel here, offering versatility that empowers innovative structural solutions.</p><p>Take high-rise buildings, for example. Their height amplifies seismic forces, requiring reinforcement that can handle both vertical loads and lateral swaying. Fe550D’s high strength reduces the quantity of steel needed, optimizing design efficiency while maintaining safety. Meanwhile, in low-rise structures like schools or hospitals—where evacuation time is critical—its ductility ensures walls and columns remain intact longer, buying precious seconds.</p><p>Brands like Gallantt Advance Fe550D TMT Rebars exemplify this balance. Engineered with cutting-edge technology, they integrate seamlessly into seismic designs, offering builders a reliable partner in creating structures that stand firm when the ground doesn’t. This isn’t just about meeting standards; it’s about exceeding expectations, a hallmark of industry leaders committed to innovation.</p><p><strong>Fe550D in Action: Real-World Impact</strong></p><p>The proof of Fe550D’s seismic prowess lies in its real-world applications. Across India, a country crisscrossed by seismic zones, Fe550D TMT rebars are transforming infrastructure. The 2016 Bhuj earthquake in Gujarat underscored the need for resilient materials, prompting a shift toward higher-grade TMT bars. Today, projects in Zone IV and V regions—such as bridges, dams, and residential complexes—rely on Fe550D to meet stringent safety codes like IS 13920:2016, India’s seismic design standard.</p><p>Globally, Fe550D’s influence is equally profound. In Japan, a pioneer in earthquake engineering, high-strength, ductile rebars akin to Fe550D underpin skyscrapers that sway gracefully during quakes. Closer to home, metro rail projects in cities like Delhi and Mumbai leverage Fe550D’s properties to ensure tunnels and elevated tracks endure both seismic and operational stresses.</p><p>These examples highlight a broader trend: Fe550D isn’t just a material; it’s a movement toward smarter, safer construction. Companies delivering solutions like Gallantt Advance Fe550D TMT Rebars are at the forefront, subtly weaving reliability into every project they touch.</p><p>&nbsp;</p><p><strong>Sustainability and Seismic Safety: A Dual Win</strong></p><p>In 2025, construction isn’t just about strength—it’s about sustainability. Fe550D TMT rebars align with this ethos, offering an eco-conscious edge. Their high strength-to-weight ratio means less steel is required per project, reducing raw material consumption and carbon emissions during production. Additionally, their durability extends structure lifespans, minimizing the need for repairs or rebuilding after seismic events.</p><p>This synergy of safety and sustainability resonates with modern builders. Green certifications like LEED and IGBC increasingly favor materials that optimize resource use without compromising performance. Fe550D fits this mold, proving that seismic resilience and environmental responsibility can coexist—a narrative that forward-thinking brands champion with pride.</p><p><strong>Why Fe550D Stands Out: A Competitive Edge</strong></p><p>Compared to lower grades like Fe500 or Fe415, Fe550D offers a clear advantage in seismic applications. While Fe500 provides decent strength, its ductility often falls short under extreme conditions. Fe415, a staple in older constructions, lacks the robustness needed for today’s ambitious designs. Fe550D bridges this gap, delivering a higher safety margin without inflating costs excessively.</p><p>For contractors, this translates to value. Fewer rebars are needed per square meter, cutting material and labor expenses. For engineers, it’s peace of mind—knowing their designs can withstand the unpredictable. And for communities, it’s the assurance of homes and workplaces that endure. Solutions like Gallantt Advance Fe550D TMT Rebars embody this edge, blending performance with practicality in a way that feels effortless yet impactful.&nbsp;</p><p><strong>The Future of Seismic Resilience</strong></p><p>As climate change intensifies seismic risks and urban populations soar, the demand for earthquake-proof infrastructure will only grow. Fe550D TMT rebars are poised to lead this charge, supported by ongoing innovations in steel manufacturing. Advances like microalloying—adding elements like vanadium or niobium—promise even greater strength and corrosion resistance, while digital tools like BIM (Building Information Modeling) optimize their integration into complex designs.</p><p>Looking ahead, Fe550D could anchor smart cities, where sensors embedded in structures monitor stress in real time, paired with rebars that adapt to shifting conditions. This isn’t science fiction—it’s the next frontier, and Fe550D is already laying the groundwork.<br><br><strong>Building Trust Through Innovation</strong></p><p>At its core, seismic resilience is about trust—trust in materials, in engineering, and in the brands that bring them to life. Fe550D TMT rebars embody this trust, offering a foundation that doesn’t just hold but inspires. Whether it’s a school in a rural seismic zone or a metro bridge in a bustling city, these rebars deliver safety with a purpose.</p><p>Industry leaders understand this. By choosing Fe550D—particularly solutions like Gallantt Advance Fe550D TMT Rebars—they signal a commitment to excellence, innovation, and the greater good. It’s a subtle yet powerful statement: when the earth shakes, their legacy stands firm.</p><p><strong>Conclusion: A Seismic Shift Worth Embracing</strong></p><p>Fe550D TMT rebars are more than a construction material—they’re a testament to human ingenuity and resilience. As seismic challenges evolve, so too must our approach to building. With their strength, ductility, and sustainability, Fe550D rebars redefine what’s possible, offering a blueprint for infrastructure that protects and endures.</p><p>For builders and engineers seeking to innovate, the message is clear: Fe550D isn’t just an option—it’s the future. And with trusted solutions like Gallantt Advance Fe550D TMT Rebars, that future is already here, quietly reinforcing the world we live in, one structure at a time.<br><br>&nbsp;</p>', '2025-04-25 08:59:22', 1),
(3, 'Fe500D vs. Fe550D: Which TMT Grade Is Right for Your Project?', 'BLOG_20250425040004_417.jpg', '<h2><strong>Introduction: Choosing the Right TMT Bar is Critical</strong></h2><p>In modern construction, selecting the right TMT (Thermo-Mechanically Treated) bar grade can determine the strength, durability, and longevity of your structure. While Fe500D and Fe550D are two of the most widely used grades, many engineers and builders are shifting towards Fe550D for high-performance applications. In this blog, we explore the technical, economic, and application-oriented aspects of both grades—and explain why Gallantt Group\'s Fe550D TMT bars might be your best bet.</p><p>&nbsp;</p><h2><strong>What are TMT Bars?</strong></h2><p>TMT bars are steel bars that undergo thermo-mechanical treatment to enhance their strength, flexibility, and corrosion resistance. They form the backbone of reinforced concrete structures and are vital to infrastructure resilience, especially in earthquake-prone and high-stress environments.</p><h2><strong>Understanding Fe500D and Fe550D Grades</strong></h2><h3><strong>What Does the \'Fe\' Stand For?</strong></h3><p>\'Fe\' stands for Iron, while the number (500 or 550) indicates the minimum yield strength of the bar in megapascals (MPa). The suffix \'D\' refers to \'Ductility,\' which means these bars have better elongation and bending capacity than standard grades.</p><h3><strong>Technical Comparison Table</strong></h3><figure class=\"table\"><table><tbody><tr><td><strong>Property</strong></td><td><strong>Fe500D</strong></td><td><strong>Fe550D</strong></td></tr><tr><td>Yield Strength</td><td>500 MPa</td><td>550 MPa</td></tr><tr><td>Ultimate Tensile Strength</td><td>565 MPa (min)</td><td>585 MPa (min)</td></tr><tr><td>Elongation (%)</td><td>16%</td><td>14.5%</td></tr><tr><td>Carbon Content</td><td>Lower</td><td>Similar</td></tr><tr><td>Applications</td><td>Mid-rise buildings, residential</td><td>High-rise buildings, bridges, metros</td></tr></tbody></table></figure><p>&nbsp;</p><h2><strong>Why Builders Prefer Fe550D Today</strong></h2><h3><strong>1. Higher Strength-to-Weight Ratio</strong></h3><p>Fe550D bars offer greater strength without increasing the bar size or weight, allowing for leaner structural design and reduced steel consumption—making projects more cost-effective.</p><h3><strong>2. Excellent Seismic Resistance</strong></h3><p>Although Fe500D is known for good ductility, Fe550D also maintains superior seismic performance while offering higher strength. It\'s ideal for infrastructure in seismic zones.</p><h3><strong>3. Durability in Harsh Conditions</strong></h3><p>Fe550D grade bars, especially those manufactured by Gallantt, are designed to perform exceptionally well in extreme environments, including coastal and industrial areas.<br><br><strong>Applications of Fe550D TMT Bars</strong></p><ul><li>High-rise commercial and residential towers</li><li>Bridges and flyovers</li><li>Metro rail infrastructure</li><li>Industrial warehouses</li><li>Power plants and large-scale civil projects</li></ul><p>Gallantt’s Fe550D bars are used in major national projects and by clients like Adani, L&amp;T, Reliance, and Tata Motors.<br><br><br>&nbsp;</p><p>&nbsp;</p><h2><strong>Why Gallantt Fe550D TMT Bars Stand Out</strong></h2><h3><strong>Integrated Manufacturing Ecosystem</strong></h3><p>Gallantt Group operates two integrated steel plants in Gorakhpur (UP) and Kutch (Gujarat). From pellet plant to rolling mill and captive power generation—every component is under one roof, ensuring superior quality control.</p><h3><strong>Ladle Refining Furnace (LRF) Advantage</strong><br><br>&nbsp;</h3><p>Gallantt is Northern India’s <strong>only private steel plant</strong> using Ladle Refining Furnace technology to eliminate impurities—delivering ultra-pure steel with high consistency.</p><h3><strong>Certified Quality</strong></h3><p>Fe550D bars from Gallantt meet IS:1786 standards and are produced using advanced German and Japanese technology.</p><h3><strong>Retail-Friendly Model</strong></h3><p>With over 5,000 dealers and a transparent price list, Gallantt’s supply chain is strong and customer-centric, ensuring on-time delivery across the country.</p><p>&nbsp;</p><h2><strong>Fe500D: Still Relevant?</strong></h2><p>Fe500D continues to be a good choice for:</p><ul><li>Low- to mid-rise residential projects</li><li>Smaller commercial buildings</li><li>Budget-sensitive rural housing</li></ul><p>However, as infrastructure demands grow more intense and complex, Fe550D offers long-term advantages.</p><p>&nbsp;</p><h2><strong>Cost vs. Performance: The Fe550D Edge</strong></h2><p>While Fe550D may come at a slightly higher price point than Fe500D, its benefits—higher strength, reduced steel quantity, and longer life—offset the upfront cost, delivering <strong>greater value over the lifecycle</strong> of a structure.</p><p>&nbsp;</p><h2><strong>Real-World Use Case: Metro Rail Construction</strong></h2><p>Metro rail projects require materials that can withstand vibration, load variation, and environmental stress. Gallantt’s Fe550D bars have been a preferred choice for such applications due to their strength, ductility, and corrosion resistance.</p><p>&nbsp;</p><h2><strong>&nbsp;FAQs</strong></h2><h3><strong>What is the difference between Fe500D and Fe550D?</strong></h3><p>Fe550D has higher yield and tensile strength than Fe500D, making it ideal for heavy-duty infrastructure like high-rise buildings and bridges.</p><h3><strong>Which is better for earthquake resistance—Fe500D or Fe550D?</strong></h3><p>Both grades offer good ductility, but Fe550D combines strength with seismic resilience, making it suitable for earthquake-prone zones.</p><h3><strong>Is Fe550D more expensive than Fe500D?</strong></h3><p>Yes, slightly. But it results in lower consumption of steel per structure, making it cost-efficient in the long run.</p><p>&nbsp;</p><h2><strong>Conclusion: Go Beyond Just Strength—Choose Smartly</strong></h2><p>While Fe500D remains a good choice for smaller projects, <strong>Fe550D is the future of smart, sustainable, and high-performance construction.</strong> And when that Fe550D comes from Gallantt Group—with its LRF purity, dealer network, and infrastructure legacy—you’re not just building, you’re building to last.</p>', '2025-04-25 09:00:04', 1),
(4, 'Why Ladle Refining Furnace (LRF) is Crucial in Manufacturing High-Quality Fe550D TMT Bars', 'BLOG_20250425040123_736.jpg', '<h2><strong>Introduction: Purity Matters in Steel</strong></h2><p>In the world of construction, every micron of steel purity can make a massive difference. Whether you\'re building a high-rise, a metro rail, or a bridge, the quality of TMT bars determines structural integrity. One game-changing process in steel manufacturing is the <strong>Ladle Refining Furnace (LRF)</strong>—a step that elevates steel quality by reducing impurities and refining composition. For Gallantt Group, the use of LRF in producing Fe550D TMT bars isn’t just a technological advantage—it’s a commitment to excellence.</p><p>&nbsp;</p><h2><strong>What is a Ladle Refining Furnace (LRF)?</strong></h2><p>A Ladle Refining Furnace is a metallurgical tool used in secondary steelmaking. After the molten steel exits the primary furnace (like Electric Arc or Induction Furnace), it enters the ladle for refining.</p><h3><strong>Key Functions of LRF:</strong></h3><ul><li><strong>Desulphurization:</strong> Removes sulfur, a harmful impurity that weakens steel.</li><li><strong>Dephosphorization:</strong> Reduces phosphorus levels to enhance steel toughness.</li><li><strong>Inclusion Removal:</strong> Eliminates non-metallic inclusions that can lead to internal cracks.</li><li><strong>Precise Alloying:</strong> Allows fine control over chemical composition.</li><li><strong>Temperature Control:</strong> Maintains optimal temperature for uniform quality.</li></ul><p>In simple terms, LRF is like the quality control lab of molten steel—ensuring that what comes next is not just strong but refined and consistent.</p><p>&nbsp;</p><h2><strong>Why LRF is Essential for Manufacturing Fe550D TMT Bars</strong></h2><p>Fe550D is a high-strength TMT grade with excellent ductility. To meet IS:1786 standards, it requires extremely precise chemical and mechanical properties.</p><h3><strong>LRF’s Role in Fe550D Production:</strong></h3><ul><li><strong>Impurity-Free Steel:</strong> By eliminating sulfur and phosphorus, LRF ensures a cleaner microstructure, which is vital for Fe550D\'s strength.</li><li><strong>Uniform Mechanical Properties:</strong> With controlled temperature and composition, the resulting TMT bars exhibit consistent yield strength and elongation.</li><li><strong>Enhanced Weldability &amp; Bendability:</strong> A refined grain structure enhances these essential construction attributes.</li><li><strong>Increased Corrosion Resistance:</strong> Cleaner steel resists corrosion better, particularly important in coastal and industrial areas.</li></ul><h3><strong>Chemistry Behind the Strength:</strong></h3><p>LRF refines steel to achieve a lower carbon equivalent (CE), which directly influences weldability and crack resistance. The tighter composition range means Fe550D bars can deliver higher strength while retaining superior ductility—key for high-load applications such as metro rail, skyscrapers, and industrial zones.</p><p>&nbsp;</p><h2><strong>Gallantt Group: Northern India’s Only Private LRF-Enabled Producer</strong></h2><p>Gallantt Group stands out as <strong>Northern India’s only private steel company</strong> using <strong>Ladle Refining Furnace</strong> technology in its integrated plants at Gorakhpur (UP) and Kutch (Gujarat). This process is a key differentiator in manufacturing <strong>Gallantt Advance Fe550D TMT Bars</strong>, giving the brand a technological edge.<br><br><strong>Integrated Plant Benefits:</strong></p><ul><li>Pellet Plant → Sponge Iron → Furnace → CCM → LRF → Rolling Mill → TMT Bars</li><li>Captive Power Plant ensures energy self-sufficiency</li><li>Cement plant for in-house civil material synergy</li></ul><p>By combining all processes under one roof, Gallantt ensures total quality control at every stage.</p><p>&nbsp;</p><h2><strong>Comparison: LRF Steel vs Non-LRF Steel</strong></h2><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>LRF Process Steel</strong></td><td><strong>Conventional Process Steel</strong></td></tr><tr><td>Purity</td><td>High</td><td>Medium to Low</td></tr><tr><td>Strength</td><td>Very High</td><td>Moderate</td></tr><tr><td>Ductility</td><td>Balanced</td><td>May Vary</td></tr><tr><td>Weldability</td><td>Excellent</td><td>May Require Caution</td></tr><tr><td>Cost-Efficiency</td><td>High Long-Term</td><td>Higher Maintenance</td></tr></tbody></table></figure><p>When it comes to infrastructure with zero room for error, LRF steel is clearly superior.</p><p>&nbsp;</p><h2><strong>Real-Life Applications: Where Fe550D &amp; LRF Steel Shine</strong></h2><ul><li><strong>Metro Rail Infrastructure</strong>: Withstand vibrations and dynamic loads</li><li><strong>High-Rise Towers</strong>: Optimal tensile strength with ductility</li><li><strong>Flyovers &amp; Bridges</strong>: Long life, corrosion resistance</li><li><strong>Industrial Plants</strong>: Better load management and weld strength</li><li><strong>Seismic Zones</strong>: Reinforcement integrity under high stress</li></ul><p>Gallantt’s Fe550D TMT Bars, processed through LRF, are built for such challenging scenarios.</p><h2><strong>&nbsp;FAQs</strong></h2><h3><strong>What is the function of Ladle Refining Furnace in steel making?</strong></h3><p>LRF refines molten steel by removing impurities, controlling temperature, and ensuring chemical uniformity before casting.</p><h3><strong>Why is LRF important for Fe550D TMT bars?</strong></h3><p>Fe550D requires high strength and ductility, which are achieved through precise refining and impurity removal—tasks best performed by an LRF.</p><h3><strong>Is steel made with LRF better?</strong></h3><p>Yes. LRF-treated steel is cleaner, stronger, and more consistent, making it suitable for critical construction applications.</p><h3><strong>Does Gallantt use LRF in TMT production?</strong></h3><p>Yes. Gallantt is the only private producer in North India with LRF in its integrated steel plants, ensuring high-grade Fe550D TMT bars.</p><h3><strong>What is the IS code for Fe550D?</strong></h3><p>Fe550D conforms to IS 1786:2008 standards for high strength deformed steel bars used in RCC construction.</p><h2><strong>Conclusion: Strength Refined by Science</strong></h2><p>Fe550D TMT bars are only as good as the steel they’re made from. Gallantt Group’s use of LRF ensures that every bar is born from precision, purity, and performance. From earthquake resistance to metro infrastructure, <strong>Gallantt Fe550D TMT Bars</strong> provide a level of reliability only refined steel can offer.</p><p>Invest in construction that’s built to last. Choose <strong>Gallantt Advance Fe550D TMT Bars</strong>—where technology meets trust.</p>', '2025-04-25 09:01:23', 1),
(5, '10 Common Cement Mistakes That Can Weaken Your Home', 'BLOG_20250425040430_823.jpg', '<h3><strong>Introduction</strong></h3><p>When building a home, every detail counts, especially when it comes to your choice and use of cement. Cement is not just a binding agent — it\'s the backbone of your home\'s structural integrity. Yet, many homeowners and even contractors unknowingly make common cement-related mistakes that lead to cracks, dampness, and long-term damage. If you want your home to stand the test of time, understanding these pitfalls is crucial.</p><p>In this comprehensive guide, we\'ll cover the <strong>10 most common cement mistakes</strong> that compromise home strength and <strong>what you should do instead</strong>. These practical tips are especially useful if you\'re constructing a home in India, where weather, soil conditions, and construction practices can pose unique challenges. Choosing a reliable cement brand like <strong>Gallantt Cement</strong>, known for its consistent quality and strength, can make a significant difference.</p><h3><strong>1. Using the Wrong Type of Cement</strong></h3><h4><strong>The Mistake:</strong></h4><p>Choosing the wrong cement grade or type for your project.</p><h4><strong>Why It Matters:</strong></h4><p>Different areas of your home require different cement strengths. Using Ordinary Portland Cement (OPC) when Portland Pozzolana Cement (PPC) or PSC would be more durable can result in weak plastering or early degradation.</p><h4><strong>What You Should Do:</strong></h4><ul><li>Use <strong>OPC 53 Grade</strong> for load-bearing structures like beams and columns.</li><li>Opt for <strong>PPC cement</strong> for plastering, masonry, and water-prone areas due to its durability and low heat of hydration.</li><li>Consult with your site engineer to match the cement type with the purpose.</li></ul><p><strong>SEO Keyword:</strong> best cement for home construction India</p><p>&nbsp;</p><h3><strong>2. Ignoring the Manufacturing &amp; Expiry Date</strong></h3><h4><strong>The Mistake:</strong></h4><p>Using expired or old cement that has lost its strength.</p><h4><strong>Why It Matters:</strong></h4><p>Cement has a shelf life of about 3 months. After this, it can start absorbing moisture and lose its binding power.</p><h4><strong>What You Should Do:</strong></h4><ul><li>Always check the <strong>manufacturing date on the cement bag</strong>.</li><li>Use cement within <strong>90 days</strong> of manufacture.</li><li>Store bags in a dry, raised platform, away from walls.</li></ul><p><strong>SEO Keyword:</strong> how to store cement properly</p><p>&nbsp;</p><h3><strong>3. Poor Storage Conditions</strong></h3><h4><strong>The Mistake:</strong></h4><p>Leaving cement bags exposed to moisture, heat, or direct sunlight.</p><h4><strong>Why It Matters:</strong></h4><p>Cement absorbs moisture quickly, which leads to lump formation and weak binding strength.</p><h4><strong>What You Should Do:</strong></h4><ul><li>Stack cement on <strong>wooden pallets</strong> at least 6 inches above ground.</li><li>Cover with plastic sheets or tarpaulin if stored outdoors.</li><li>Follow <strong>FIFO (First In, First Out)</strong> usage to prevent expiry.</li></ul><p><strong>SEO Keyword:</strong> cement storage best practices</p><p>&nbsp;</p><h3><strong>4. Incorrect Water-Cement Ratio</strong></h3><h4><strong>The Mistake:</strong></h4><p>Adding too much or too little water during mixing.</p><h4><strong>Why It Matters:</strong></h4><p>An incorrect water-cement ratio affects the setting time, strength, and overall durability.</p><h4><strong>What You Should Do:</strong></h4><ul><li>Maintain a <strong>0.4 to 0.6 water-cement ratio</strong>, depending on the application.</li><li>Avoid adding water \"by eye\" — use a measuring container.</li><li>Add water in small batches while mixing.</li></ul><p><strong>SEO Keyword:</strong> ideal water cement ratio for concrete</p><p>&nbsp;</p><h3><strong>5. Improper Mixing</strong></h3><h4><strong>The Mistake:</strong></h4><p>Uneven or inconsistent mixing of cement with sand, gravel, and water.</p><h4><strong>Why It Matters:</strong></h4><p>Poorly mixed concrete forms weak points that lead to cracking or water seepage.</p><h4><strong>What You Should Do:</strong></h4><ul><li>Use a <strong>mechanical mixer</strong> for consistency.</li><li>If mixing by hand, follow the <strong>1:2:4 mix ratio</strong> (cement:sand:aggregate) for general concrete.</li><li>Mix thoroughly for at least <strong>2 minutes</strong> before pouring.</li></ul><p><strong>SEO Keyword:</strong> cement mixing tips for home builders</p><p>&nbsp;</p><h3><strong>6. Skipping the Curing Process</strong></h3><h4><strong>The Mistake:</strong></h4><p>Not curing the concrete after pouring.</p><h4><strong>Why It Matters:</strong></h4><p>Curing ensures that the cement retains moisture for strength development. Skipping it leads to surface cracks and internal weakness.</p><h4><strong>What You Should Do:</strong></h4><ul><li>Begin curing <strong>24 hours</strong> after pouring.</li><li>Keep the surface moist for at least <strong>7 days</strong> (preferably 14).</li><li>Use gunny bags, sprinklers, or water ponds for curing.</li></ul><p><strong>SEO Keyword:</strong> importance of concrete curing</p><p>&nbsp;</p><h3><strong>7. Plastering Before Full Setting</strong></h3><h4><strong>The Mistake:</strong></h4><p>Applying plaster or installing tiles on a surface that hasn\'t fully cured.</p><h4><strong>Why It Matters:</strong></h4><p>This traps moisture, causing weak bonds and peeling or cracking.</p><h4><strong>What You Should Do:</strong></h4><ul><li>Wait until the base layer is fully cured.</li><li>Check surface strength before proceeding to plaster.</li><li>Use <strong>bonding agents</strong> when required.</li></ul><p><strong>SEO Keyword:</strong> how long to wait before plastering<br><br><br><strong>8. Overloading Structures Prematurely</strong></p><h4><strong>The Mistake:</strong></h4><p>Placing loads or doing further construction before concrete reaches strength.</p><h4><strong>Why It Matters:</strong></h4><p>Concrete takes time to achieve full strength (typically 28 days). Premature loading can cause hairline cracks and structural shifts.</p><h4><strong>What You Should Do:</strong></h4><ul><li>Avoid placing any heavy materials or loads before <strong>7-10 days</strong>.</li><li>Wait at least <strong>28 days</strong> for full load-bearing capacity.</li></ul><p><strong>SEO Keyword:</strong> concrete load bearing time</p><p>&nbsp;</p><h3><strong>9. Using Sea Sand or Impure Water</strong></h3><h4><strong>The Mistake:</strong></h4><p>Using contaminated sand or water in the concrete mix.</p><h4><strong>Why It Matters:</strong></h4><p>Salts in sea sand or dirty water can corrode steel reinforcement and weaken the structure.</p><h4><strong>What You Should Do:</strong></h4><ul><li>Use <strong>river sand</strong> with low silt content.</li><li>Ensure water is <strong>clean and potable</strong>.</li><li>Avoid sand with a visible white layer (a sign of salt).</li></ul><p><strong>SEO Keyword:</strong> best sand and water for concrete mix</p><h3><strong>10. No Supervision or Site Testing</strong></h3><h4><strong>The Mistake:</strong></h4><p>Leaving cement work entirely to labourers without supervision or quality checks.</p><h4><strong>Why It Matters:</strong></h4><p>Even skilled workers need direction. A minor mistake in mix, application, or setting can result in major long-term damage.</p><h4><strong>What You Should Do:</strong></h4><ul><li>Appoint a <strong>certified site engineer</strong> or supervisor.</li><li>Conduct <strong>slump tests</strong>, <strong>cube tests</strong>, and regular quality checks.</li><li>Ensure cement bags are not substituted without notice.</li></ul><p><strong>SEO Keyword:</strong> site supervision during house construction</p><h3><strong>Conclusion</strong></h3><p><strong>Avoiding these 10 common mistakes</strong> ensures that you build not just a home, but a safe, strong, and enduring one. Choosing quality products like <strong>Gallantt Cement</strong>, backed by strict quality controls and consistent strength, can give you added confidence while constructing your dream home.</p><p><strong>Avoiding these 10 common mistakes</strong> ensures that you build not just a home, but a safe, strong, and enduring one.</p>', '2025-04-25 09:04:30', 1),
(6, 'Crack-Proof Construction: How to Avoid Shrinkage & Surface Failures', 'BLOG_20250425040856_944.jpg', '<h4><strong>Introduction</strong></h4><p>Cracks in concrete structures are among the most common and frustrating problems faced by homeowners, contractors, and engineers alike. From hairline cracks on newly plastered walls to deep shrinkage cracks in slabs and beams — these issues not only ruin the aesthetics but also compromise the structural integrity of buildings over time.</p><p>The good news? Most cracks are preventable if construction is done with careful planning and quality execution. From the <strong>design stage to curing</strong>, every phase matters. This blog serves as your in-depth guide to <strong>crack-proof construction</strong>, especially curated for Indian conditions. We’ll also spotlight how premium cement options like <strong>Gallantt Cement</strong>, known for their superior composition and durability, can help reduce these risks significantly.</p><p>&nbsp;</p><h4><strong>1. Understand Why Cracks Happen</strong></h4><p>Cracks in concrete can appear due to a wide variety of reasons, and not all of them are structural. Let’s break down the main types:</p><p><strong>a) Plastic Shrinkage Cracks:</strong></p><p>Occur when water from the surface evaporates faster than it can be replaced by bleeding.</p><p><strong>b) Drying Shrinkage Cracks:</strong></p><p>Happen after hardening due to moisture loss over time.</p><p><strong>c) Thermal Cracking:</strong></p><p>Temperature variations in different parts of the structure lead to expansion and contraction.</p><p><strong>d) Settlement Cracks:</strong></p><p>Caused by uneven settlement of the foundation or poor soil conditions.</p><p><strong>e) Poor-Quality Materials:</strong></p><p>Using low-grade or inconsistent cement leads to weak bonding and long-term cracking.</p><p>&nbsp;</p><h4><strong>2. Design Stage: Plan with Precision</strong></h4><p>Many cracks originate from design faults. A good structural engineer can ensure your plan considers the following:</p><ul><li>Proper load distribution</li><li>Accurate expansion joints</li><li>Optimal concrete thickness</li><li>Correct placement of reinforcements</li><li>Soil condition evaluation</li></ul><p><strong>Tip:</strong> Always insist on soil testing before foundation laying. In areas with clayey soil or high water tables, extra precautions are essential.<br><br><strong>3. Material Selection: Quality Matters More Than You Think</strong></p><p>Low-quality cement and aggregates are one of the biggest culprits for cracking. Cheap substitutes often have high impurities and inconsistent strength.</p><p><strong>Why Gallantt Cement?</strong></p><ul><li><strong>Low Alkali Content:</strong> Reduces alkali-silica reaction</li><li><strong>High Fineness &amp; Consistency:</strong> Promotes uniform hydration</li><li><strong>Tested Quality Controls:</strong> Each batch is tested for compressive strength</li><li><strong>Optimized for Indian Conditions:</strong> Works well even in coastal and humid environments</li></ul><p>Choosing <strong>Gallantt Cement</strong> is a proactive step in ensuring long-term crack resistance.</p><p>Also:</p><ul><li>Use <strong>graded aggregates</strong> that are clean and silt-free</li><li>Ensure water used is <strong>clean and potable</strong></li></ul><p>&nbsp;</p><p><strong>4. Mixing Matters: Precision in Proportions</strong></p><p>Improper water-cement ratio or poor mixing leads to honeycombing, voids, and weak concrete.</p><p><strong>Best Practices:</strong></p><ul><li>Maintain water-cement ratio between <strong>0.45 – 0.6</strong></li><li>Avoid hand mixing for structural concrete</li><li>Always batch aggregates and water by weight, not volume</li></ul><p><strong>Pro Tip:</strong> Mix small batches if using manually and use immediately. Delayed usage reduces workability.</p><p><strong>5. Placing &amp; Compaction: Don’t Rush This Step</strong></p><p>Once concrete is poured, poor compaction leaves air pockets — a major crack trigger.</p><p><strong>What You Should Do:</strong></p><ul><li>Use <strong>mechanical vibrators</strong> to eliminate air gaps</li><li>Compact in layers, especially for slabs and columns</li><li>Avoid over-vibration which may cause segregation</li></ul><p><strong>6. Curing: The Most Neglected Yet Most Crucial Step</strong></p><p>Curing allows concrete to gain strength gradually and uniformly. Without it, surface cracks are inevitable.</p><p><strong>Curing Tips:</strong></p><ul><li>Start curing <strong>24 hours</strong> after casting</li><li>Keep concrete moist for <strong>minimum 7 days</strong>, preferably 14</li><li>Use <strong>gunny bags, sprinklers, or water ponding</strong></li></ul><p><strong>Why Gallantt Cement Supports Better Curing</strong></p><p>Due to its low heat of hydration and balanced fineness, <strong>Gallantt Cement</strong> shows excellent strength gain over time — especially when combined with effective curing techniques.</p><p><strong>7. Control Joints: Essential for Larger Structures</strong></p><p>Without properly placed joints, concrete expands and contracts without room — causing random cracks.</p><p><strong>Ideal Control Joint Placement:</strong></p><ul><li>For slabs: every 3–4 meters</li><li>In walls: control at openings like doors/windows</li><li>In long beams: provide expansion gaps if exceeding 8–10 meters</li></ul><p>&nbsp;</p><p><strong>8. Weather Conditions: Be Weather-Wise</strong></p><p>Extreme heat or sudden rain can undo all your good work.</p><p><strong>Construction in Summer:</strong></p><ul><li>Avoid pouring during peak afternoon heat</li><li>Use curing compounds or water spray to cool surface</li></ul><p><strong>Construction in Monsoon:</strong></p><ul><li>Cover freshly laid concrete with plastic sheets</li><li>Stop water accumulation on curing slabs</li></ul><p><strong>9. Preventive Additives and Treatments</strong></p><p>Today’s technology allows adding <strong>anti-shrinkage admixtures</strong> or <strong>polypropylene fibers</strong> to enhance crack resistance.</p><p>These additives:</p><ul><li>Reduce drying shrinkage</li><li>Improve tensile strength</li><li>Minimize internal micro-cracking</li></ul><p>Speak to your site engineer about pairing high-performance cement like <strong>Gallantt Cement</strong> with such enhancements.</p><p>&nbsp;</p><p><strong>10. Post-Construction Care: Small Steps, Big Impact</strong></p><p>Even after construction, improper drilling, hanging loads, or ignoring seepage can lead to cracks.</p><p><strong>Homeowner Best Practices:</strong></p><ul><li>Avoid drilling into load-bearing walls</li><li>Fix plumbing leakages promptly</li><li>Use waterproof paints or coatings on external walls</li></ul><p><strong>Conclusion</strong></p><p>Cracks are a symptom of oversight — be it poor design, inferior materials, or improper execution. But with careful planning, quality workmanship, and the right cement, you can minimize risks significantly.</p><p><strong>Gallantt Cement</strong> offers the strength, consistency, and durability that modern construction demands. Its low-shrinkage formulation, combined with quality aggregates and good practices, ensures that your structure remains crack-resistant for decades.</p><p>Building a home is a once-in-a-lifetime investment. Don’t let small mistakes result in big regrets.</p><p>Choose quality. Choose durability. Choose <strong>Gallantt Cement</strong> for a <strong>crack-proof foundation</strong>.</p><p><strong>FAQs on Crack-Free Construction</strong></p><p><strong>Q1. Can all cracks in concrete be prevented?</strong> Not all, but 90% of cracks are avoidable with proper planning, materials, and curing.</p><p><strong>Q2. Is Gallantt Cement good for home construction?</strong> Yes. Gallantt Cement is ideal for homes due to its low alkali content, high strength, and uniform quality.</p><p><strong>Q3. What\'s the best curing method in hot weather?</strong> Use continuous water curing or curing compounds to retain moisture in concrete.</p><p><strong>Q4. What’s the best cement for coastal areas?</strong> Use corrosion-resistant cement with low chloride content. Gallantt offers options that suit coastal and humid zones.</p><p><strong>Q5. What kind of cracks are most dangerous?</strong> Structural cracks — wide, deep, and recurring ones — require urgent professional inspection.</p>', '2025-04-25 09:08:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `web_contactform`
--

CREATE TABLE `web_contactform` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_contactform`
--

INSERT INTO `web_contactform` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`) VALUES
(1, 'Sridhar', 'sridharjnet@gmail.com', '9435345345345', 'ghfghfghfg', 'sdfsdfsd', '2025-05-01 15:09:01'),
(2, 'Sridhar', 'sridharjnet@gmail.com', '9435345345345', 'ghfghfghfg', 'sdfsdfsd', '2025-05-01 15:09:35'),
(3, 'Sridhar', 'sridhgarjnet@gmail.com', '9435345345345', 'ghfghfghfg', 'sdfsdfsd', '2025-05-01 15:09:44'),
(4, 'Sridhar', 'sridhgarjnet@gmail.com', '9435345345345', 'ghfghfghfg', 'sdfsdfsd', '2025-05-01 15:10:35'),
(5, 'Sridhar', 'sridhar.webdev@gmail.com', '9435345345345', 'ghfghfghfg', 'sdfsdf', '2025-05-01 15:13:00'),
(6, 'Sridhar', 'rupeshpo123@gmail.com', '9435345345345', 'ghfghfghfg', 'cvbv', '2025-05-01 15:15:27'),
(7, 'Sridhar', 'rupeshpo123@gmail.com', '9435345345345', 'ghfghfghfg', 'sdfsdfsdf', '2025-05-01 15:17:20'),
(8, 'Sridhar', 'rupeshpo123@gmail.com', '9435345345345', 'ghfghfghfg', 'adfsdfsdf', '2025-05-01 15:19:52'),
(9, 'Sridhar', 'sridharjnet@gmail.com', '9435345345345', 'ghfghfghfg', 'dafsdfsdfsdf', '2025-05-01 15:21:25'),
(10, 'Sridhar', 'rupeshpo123@gmail.com', '9435345345345', 'ghfghfghfg', 'dfsfsfd', '2025-05-01 15:26:50'),
(11, 'amit', 'amit.jain@gallantt.com', '6391090000', 'tmt query', 'hi need 15 ton of tmt bars', '2025-05-23 11:06:54');

-- --------------------------------------------------------

--
-- Table structure for table `web_corporatereports`
--

CREATE TABLE `web_corporatereports` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `doc` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_corporatereports`
--

INSERT INTO `web_corporatereports` (`id`, `title`, `description`, `doc`, `created_at`) VALUES
(1, 'Report 03', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dolor felis, suscipit at est ullamcorper, mollis pellentesque arcu. Vestibulum diam sapien, pharetra in dui in,</p>', 'REPORT_20250405181015_626.pdf', '2025-04-05 16:10:15'),
(2, 'Results - Financial Results For The Period 31.12.2024', '<p>Submission of Unaudited Standalone and Consolidated Financial Results for the quarter and nine months ended 31st December, 2024.</p><p><strong>05 Feb, 2025 | 02:57pm</strong></p>', 'REPORT_20250520042357_955.pdf', '2025-04-05 16:11:07'),
(3, 'Announcement under Regulation 30 (LODR) -Meeting Updates', '<p>Submission of outcome of Board Meeting approving the proposal to expand capacity of various plants and setting up of captive solar power plant</p>', 'REPORT_20250520042105_846.pdf', '2025-04-05 16:11:21'),
(4, 'Board Meeting Intimation for Approval And Consideration Of Audited Financial Results', '<p>Gallantt Ispat Ltdhas informed BSE that the meeting of the Board of Directors of the Company is scheduled on 21/05/2025 ,inter alia, to consider and approve Audited Financial Results for the quarter and year ended 31st March, 2025, Audited Annual Accounts of the Company, Recommendation of Final Dividend, if any, and other matters</p>', 'REPORT_20250520041656_351.pdf', '2025-05-08 14:24:11');

-- --------------------------------------------------------

--
-- Table structure for table `web_districts`
--

CREATE TABLE `web_districts` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_districts`
--

INSERT INTO `web_districts` (`id`, `state_id`, `name`) VALUES
(1, 1, 'Agra'),
(2, 1, 'Aligarh'),
(3, 1, 'Allahabad'),
(4, 1, 'Ambedkar Nagar'),
(5, 1, 'Amethi'),
(6, 1, 'Amroha'),
(7, 1, 'Auraiya'),
(8, 1, 'Azamgarh'),
(9, 1, 'Baghpat'),
(10, 1, 'Bahraich'),
(11, 1, 'Ballia'),
(12, 1, 'Balrampur'),
(13, 1, 'Banda'),
(14, 1, 'Bara Banki'),
(15, 1, 'Bareilly'),
(16, 1, 'Basti'),
(17, 1, 'Bhadohi'),
(18, 1, 'Bijnor'),
(19, 1, 'Budaun'),
(20, 1, 'Bulandshahr'),
(21, 1, 'Chandauli'),
(22, 1, 'Chitrakoot'),
(23, 1, 'Deoria'),
(24, 1, 'Etah'),
(25, 1, 'Etawah'),
(26, 1, 'Faizabad'),
(27, 1, 'Farrukhabad'),
(28, 1, 'Fatehpur'),
(29, 1, 'Firozabad'),
(30, 1, 'Gautam Buddha Nagar'),
(31, 1, 'Ghaziabad'),
(32, 1, 'Ghazipur'),
(33, 1, 'Gonda'),
(34, 1, 'Gorakhpur'),
(35, 1, 'Hamirpur'),
(36, 1, 'Hapur'),
(37, 1, 'Hardoi'),
(38, 1, 'Hathras'),
(39, 1, 'Jalaun'),
(40, 1, 'Jaunpur'),
(41, 1, 'Jhansi'),
(42, 1, 'Kannauj'),
(43, 1, 'Kanpur Dehat'),
(44, 1, 'Kanpur Nagar'),
(45, 1, 'Kasganj'),
(46, 1, 'Kaushambi'),
(47, 1, 'Kheri'),
(48, 1, 'Kushinagar'),
(49, 1, 'Lalitpur'),
(50, 1, 'Lucknow'),
(51, 1, 'Mahoba'),
(52, 1, 'Mahrajganj'),
(53, 1, 'Mainpuri'),
(54, 1, 'Mathura'),
(55, 1, 'Mau'),
(56, 1, 'Meerut'),
(57, 1, 'Mirzapur'),
(58, 1, 'Moradabad'),
(59, 1, 'Muzaffarnagar'),
(60, 1, 'Pilibhit'),
(61, 1, 'Pratapgarh'),
(62, 1, 'Rae Bareli'),
(63, 1, 'Rampur'),
(64, 1, 'Saharanpur'),
(65, 1, 'Sambhal'),
(66, 1, 'Sant Kabir Nagar'),
(67, 1, 'Shahjahanpur'),
(68, 1, 'Shamli'),
(69, 1, 'Shrawasti'),
(70, 1, 'Siddharthnagar'),
(71, 1, 'Sitapur'),
(72, 1, 'Sonbhadra'),
(73, 1, 'Sultanpur'),
(74, 1, 'Unnao'),
(75, 1, 'Varanasi'),
(76, 1, 'Almora'),
(77, 1, 'Bageshwar'),
(78, 1, 'Chamoli'),
(79, 1, 'Champawat'),
(80, 1, 'Dehradun'),
(81, 1, 'Garhwal'),
(82, 1, 'Hardwar'),
(83, 1, 'Nainital'),
(84, 1, 'Pithoragarh'),
(85, 1, 'Rudraprayag'),
(86, 1, 'Tehri Garhwal'),
(87, 1, 'Udham Singh Nagar'),
(88, 1, 'Uttarkashi'),
(89, 2, 'Ahmadabad'),
(90, 2, 'Amreli'),
(91, 2, 'Anand'),
(92, 2, 'Arvalli'),
(93, 2, 'Banas Kantha'),
(94, 2, 'Bharuch'),
(95, 2, 'Bhavnagar'),
(96, 2, 'Botad'),
(97, 2, 'Chhota Udepur'),
(98, 2, 'Devbhoomi Dwarka'),
(99, 2, 'Dohad'),
(100, 2, 'Gandhinagar'),
(101, 2, 'Gir Somnath'),
(102, 2, 'Jamnagar'),
(103, 2, 'Junagadh'),
(104, 2, 'Kachchh'),
(105, 2, 'Kheda'),
(106, 2, 'Mahesana'),
(107, 2, 'Mahisagar'),
(108, 2, 'Morbi'),
(109, 2, 'Narmada'),
(110, 2, 'Navsari'),
(111, 2, 'Panch Mahals'),
(112, 2, 'Patan'),
(113, 2, 'Porbandar'),
(114, 2, 'Rajkot'),
(115, 2, 'Sabar Kantha'),
(116, 2, 'Surat'),
(117, 2, 'Surendranagar'),
(118, 2, 'Tapi'),
(119, 2, 'The Dangs'),
(120, 2, 'Vadodara'),
(164, 1, 'All Uttar Pradesh'),
(165, 1, 'All Districts'),
(166, 2, 'All Districts');

-- --------------------------------------------------------

--
-- Table structure for table `web_employeewelfare`
--

CREATE TABLE `web_employeewelfare` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_employeewelfare`
--

INSERT INTO `web_employeewelfare` (`id`, `title`, `image`, `description`, `created_at`) VALUES
(1, 'Organizing of Half Marathon Event', 'uploads/EMP_WEL_25_05_20_855.jpeg', 'Gallantt Group successfully organized a half marathon event, promoting health, fitness, and community spirit. This initiative brought people together to celebrate wellness while reinforcing our dedication to fostering an active and vibrant society.', '2025-05-20 09:20:11'),
(2, 'Inauguration of School in Sahjanwa', 'uploads/EMP_WEL_25_05_20_344.jpg', 'Gallantt Group proudly inaugurated a new school in Sahjanwa, empowering the community with access to quality education. This initiative underscores our commitment to nurturing young minds and building a brighter future for generations to come.', '2025-05-20 09:20:48'),
(3, 'Chief Minister Flagging the Food Van', 'uploads/EMP_WEL_25_05_20_912.jpg', 'Honrable Chief Minister shri yogi adityanath flagged off Gallantt Group’s food van initiative, lauding our efforts to combat hunger. This event marked a milestone in our mission to serve the community and uphold our social responsibility.', '2025-05-20 09:21:15'),
(4, 'Village Lake Recharge', 'uploads/EMP_WEL_25_05_20_958.jpg', 'In a significant environmental initiative, Gallantt Group rejuvenated a village lake, boosting groundwater levels and supporting agriculture. This project emphasizes our dedication to sustainability and ecological balance.', '2025-05-20 09:21:35'),
(5, 'Village Road Construction', 'uploads/EMP_WEL_25_05_20_926.JPG', 'Gallantt Group contributed to rural development by constructing a durable village road, improving connectivity and fostering economic growth. This effort highlights our commitment to empowering rural communities.', '2025-05-20 09:23:45'),
(6, 'Inauguration of Dialysis Unit', 'uploads/EMP_WEL_25_05_20_175.jpg', 'Gallantt Group inaugurated a state-of-the-art dialysis unit to provide affordable, quality healthcare. This initiative addresses critical healthcare needs, ensuring life-saving treatments are accessible to those in need.', '2025-05-20 09:24:10'),
(7, 'Health Camp', 'uploads/EMP_WEL_25_05_20_709.jpg', 'Gallantt Group organized a comprehensive health camp, offering free check-ups and medical consultations. This program underscores our commitment to improving community health and promoting well-being in underserved areas.', '2025-05-20 09:24:32'),
(8, 'Free Food Distribution Truck', 'uploads/EMP_WEL_25_05_20_035.jpg', 'Gallantt Group launched a free food distribution truck, serving hot meals to the underprivileged. This ongoing initiative is a testament to our resolve in combating hunger and uplifting society\'s marginalized sections.', '2025-05-20 09:24:56'),
(9, 'Food Distribution During COVID', 'uploads/EMP_WEL_25_05_20_778.jpeg', 'In response to the COVID-19 pandemic, Gallantt Group provided essential food supplies to the needy. This humanitarian effort ensured that no family went hungry during these challenging times, showcasing our unwavering support for the community.', '2025-05-20 09:25:16'),
(10, 'City Beautification Statue on Street Crossing', 'uploads/EMP_WEL_25_05_20_884.jpg', 'Gallantt Group organized a blood donation camp, bringing together employees and the community to donate blood and save lives. This initiative reflects our commitment to healthcare and community welfare, fostering a spirit of compassion and service.', '2025-05-20 09:25:35'),
(11, 'Blood Donation Camp', 'uploads/EMP_WEL_25_05_20_023.jpeg', 'Gallantt Group organized a blood donation camp, bringing together employees and the community to donate blood and save lives. This initiative reflects our commitment to healthcare and community welfare, fostering a spirit of compassion and service.', '2025-05-20 09:25:56');

-- --------------------------------------------------------

--
-- Table structure for table `web_financialhighlight`
--

CREATE TABLE `web_financialhighlight` (
  `id` int(11) NOT NULL,
  `highlights` text NOT NULL,
  `consolidated` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_financialhighlight`
--

INSERT INTO `web_financialhighlight` (`id`, `highlights`, `consolidated`, `created_at`) VALUES
(1, 'Sales', '4227', '2025-05-15 21:50:18'),
(2, 'Expenses', '3779', '2025-05-15 21:50:18'),
(3, 'operating profits', '428', '2025-05-15 21:50:18'),
(4, 'OPM %', '11', '2025-05-15 21:51:04'),
(5, 'Other Income', '7', '2025-05-15 21:51:04'),
(6, 'Interest', '28', '2025-05-15 21:51:04'),
(7, 'Depreciation', '116', '2025-05-15 21:51:04'),
(8, 'PAT', '311', '2025-05-15 21:51:04'),
(9, 'Tax %', '28', '2025-05-15 21:53:06'),
(10, 'Net profit', '225', '2025-05-15 21:53:06'),
(11, 'EPS', '9.34', '2025-05-15 21:53:06'),
(12, 'Dividend', '11%', '2025-05-15 21:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `web_financialreports`
--

CREATE TABLE `web_financialreports` (
  `id` int(11) NOT NULL,
  `report_name` varchar(255) NOT NULL,
  `report_file` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_financialreports`
--

INSERT INTO `web_financialreports` (`id`, `report_name`, `report_file`, `created_at`) VALUES
(1, 'profit and loss', 'FINAL_REPORT_2025_05_08_826.pdf', '2025-05-08 14:16:07');

-- --------------------------------------------------------

--
-- Table structure for table `web_homepagevideo`
--

CREATE TABLE `web_homepagevideo` (
  `id` int(11) NOT NULL,
  `video_name` varchar(255) NOT NULL,
  `video_path` varchar(255) NOT NULL,
  `uploaded_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_homepagevideo`
--

INSERT INTO `web_homepagevideo` (`id`, `video_name`, `video_path`, `uploaded_at`) VALUES
(3, 'homepage_video_1747410353.mp4', 'uploads/videos/homepage_video_1747410353.mp4', '2025-05-16 21:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `web_investorreportheading`
--

CREATE TABLE `web_investorreportheading` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_investorreportheading`
--

INSERT INTO `web_investorreportheading` (`id`, `title`) VALUES
(1, 'Financial Highlights & Reports FY2023-24');

-- --------------------------------------------------------

--
-- Table structure for table `web_investorreports`
--

CREATE TABLE `web_investorreports` (
  `id` int(11) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `subcategory` varchar(100) DEFAULT NULL,
  `title` text,
  `file_path` text,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_investorreports`
--

INSERT INTO `web_investorreports` (`id`, `category`, `subcategory`, `title`, `file_path`, `created_at`) VALUES
(1, '1', '6', 'Code of Conduct for BOD & SMP w.e.f. 01.04.2023', 'INVST_REPORT_21042025_359.pdf', '2025-04-21 22:09:02'),
(2, '1', '6', 'Code of Conduct for Insider Trading', 'INVST_REPORT_21042025_366.pdf', '2025-04-21 22:09:02'),
(3, '2', '8', 'Annual Reports 2020', 'INVST_REPORT_21042025_825.pdf', '2025-04-21 22:10:16'),
(4, '2', '8', 'Annual Reports 2024', 'INVST_REPORT_21042025_705.pdf', '2025-04-21 22:10:16'),
(5, '3', '10', 'Monitoring Reports', 'INVST_REPORT_21042025_229.pdf', '2025-04-21 22:11:10'),
(6, '4', '', '1. BSE_Annexure 1_Board Resolutions', 'INVST_REPORT_21042025_197.pdf', '2025-04-21 22:11:55'),
(7, '1', '11', 'related party transaction policy', 'INVST_REPORT_02052025_189.pdf', '2025-05-02 19:01:51');

-- --------------------------------------------------------

--
-- Table structure for table `web_jobapplication`
--

CREATE TABLE `web_jobapplication` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `resume_file` varchar(255) DEFAULT NULL,
  `applied_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_jobapplication`
--

INSERT INTO `web_jobapplication` (`id`, `job_id`, `job_title`, `name`, `email`, `resume_file`, `applied_at`) VALUES
(1, 3, 'Job Title 03', 'amit jain', 'akj230875@gmail.com', 'AMIT-JAIN-JOB-TITLE-03-415.PDF', '2025-05-01 14:18:30'),
(2, 3, 'Job Title 03', 'amit jain', 'akj230875@gmail.com', 'AMIT-JAIN-JOB-TITLE-03-967.PDF', '2025-05-01 14:18:40'),
(3, 4, 'Institutional Sales Manager', 'amit', 'amit.jain@gallantt.com', 'AMIT-INSTITUTIONAL-SALES-MANAGER-357.PDF', '2025-05-27 19:09:28');

-- --------------------------------------------------------

--
-- Table structure for table `web_jobs`
--

CREATE TABLE `web_jobs` (
  `job_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `job_type` enum('Full-Time','Part-Time','Contract') NOT NULL,
  `location` varchar(255) NOT NULL,
  `vacancies` int(11) NOT NULL,
  `job_description` text NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('active','disabled','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_jobs`
--

INSERT INTO `web_jobs` (`job_id`, `job_title`, `department`, `experience`, `job_type`, `location`, `vacancies`, `job_description`, `date_posted`, `status`) VALUES
(1, 'Job Title 01', 'Real Estate', '4 Years', 'Full-Time', 'Gujarat', 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dolor felis, suscipit at est ullamcorper, mollis pellentesque arcu. Vestibulum diam sapien, pharetra in dui in, sodales consectetur urna. Nam viverra felis odio, id vestibulum erat sodales at. Etiam a nunc eu ante feugiat porttitor. Maecenas tincidunt id justo in semper. Nullam ac mattis arcu. Donec a neque scelerisque, vestibulum dui sodales, commodo sapien. Nullam convallis ex at quam maximus, ac porta quam vehicula. Pellentesque malesuada eget lacus ut sollicitudin. Integer fermentum eget felis sit amet consequat. Donec tempus pellentesque mauris.</p>', '2025-04-05 16:01:20', 'active'),
(2, 'Job Title 02', 'Steel', '3 Years', 'Full-Time', 'Gujarat', 3, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla dolor felis, suscipit at est ullamcorper, mollis pellentesque arcu. Vestibulum diam sapien, pharetra in dui in, sodales consectetur urna. Nam viverra felis odio, id vestibulum erat sodales at. Etiam a nunc eu ante feugiat porttitor. Maecenas tincidunt id justo in semper. Nullam ac mattis arcu. Donec a neque scelerisque, vestibulum dui sodales, commodo sapien. Nullam convallis ex at quam maximus, ac porta quam vehicula. Pellentesque malesuada eget lacus ut sollicitudin. Integer fermentum eget felis sit amet consequat. Donec tempus pellentesque mauris.</p>', '2025-04-05 16:01:42', 'active'),
(3, 'Job Title 03', 'Cement', '6 Years', 'Full-Time', 'Uttar Pradesh', 2, '<p><strong>Roles and Responsibilities</strong><br>&nbsp;</p><ul><li>Develop and execute sales strategies to achieve revenue targets through effective government liaison, tender management, and project marketing.<br>&nbsp;</li><li>Build strong relationships with key decision-makers in government agencies, PSUs, and other institutions to identify business opportunities.<br>&nbsp;</li><li>Manage a team of sales professionals to drive institutional sales growth across various sectors such as education, healthcare, infrastructure development projects.<br>&nbsp;</li><li>Collaborate with cross-functional teams (marketing, operations) to develop targeted campaigns for government tenders and projects.<br>&nbsp;</li><li>Analyze market trends and competitor activity to stay ahead in the competitive institutional landscape.</li></ul><p><strong>Roles and Responsibilities</strong><br>&nbsp;</p><ul><li>Develop and execute sales strategies to achieve revenue targets through effective government liaison, tender management, and project marketing.<br>&nbsp;</li><li>Build strong relationships with key decision-makers in government agencies, PSUs, and other institutions to identify business opportunities.<br>&nbsp;</li><li>Manage a team of sales professionals to drive institutional sales growth across various sectors such as education, healthcare, infrastructure development projects.<br>&nbsp;</li><li>Collaborate with cross-functional teams (marketing, operations) to develop targeted campaigns for government tenders and projects.<br>&nbsp;</li><li>Analyze market trends and competitor activity to stay ahead in the competitive institutional landscape.<br><br><strong>Roles and Responsibilities</strong><br>&nbsp;</li><li>Develop and execute sales strategies to achieve revenue targets through effective government liaison, tender management, and project marketing.<br>&nbsp;</li><li>Build strong relationships with key decision-makers in government agencies, PSUs, and other institutions to identify business opportunities.<br>&nbsp;</li><li>Manage a team of sales professionals to drive institutional sales growth across various sectors such as education, healthcare, infrastructure development projects.<br>&nbsp;</li><li>Collaborate with cross-functional teams (marketing, operations) to develop targeted campaigns for government tenders and projects.<br>&nbsp;</li><li>Analyze market trends and competitor activity to stay ahead in the competitive institutional landscape.</li></ul>', '2025-04-05 16:02:01', 'active'),
(4, 'Institutional Sales Manager', 'Steel', '7 Yrs', 'Full-Time', 'Uttar Pradesh', 1, '<p><strong>Roles and Responsibilities</strong><br>&nbsp;</p><ul><li>Develop and execute sales strategies to achieve revenue targets through effective government liaison, tender management, and project marketing.<br>&nbsp;</li><li>Build strong relationships with key decision-makers in government agencies, PSUs, and other institutions to identify business opportunities.<br>&nbsp;</li><li>Manage a team of sales professionals to drive institutional sales growth across various sectors such as education, healthcare, infrastructure development projects.<br>&nbsp;</li><li>Collaborate with cross-functional teams (marketing, operations) to develop targeted campaigns for government tenders and projects.<br>&nbsp;</li><li>Analyze market trends and competitor activity to stay ahead in the competitive institutional landscape.</li></ul>', '2025-05-27 12:32:07', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `web_mediagallery`
--

CREATE TABLE `web_mediagallery` (
  `id` int(11) NOT NULL,
  `media_name` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` text,
  `media_image` varchar(256) NOT NULL,
  `media_type` varchar(255) NOT NULL,
  `date_of_post` date NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('live','disabled') DEFAULT NULL,
  `media_file` varchar(255) DEFAULT NULL,
  `media_file_type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_mediagallery`
--

INSERT INTO `web_mediagallery` (`id`, `media_name`, `section`, `category`, `description`, `media_image`, `media_type`, `date_of_post`, `last_update`, `status`, `media_file`, `media_file_type`) VALUES
(1, 'Dealer Trip', 'Life at Gallantt', 'Event', '<p>Moments from our Almaty dealer tour — where partnerships grow stronger through shared experiences, cultural discovery, and the spirit of the Gallantt family.</p>', 'MEDIA_20250520090404_664.jpg', 'image', '2025-04-05', '2025-05-20 14:04:05', 'live', NULL, NULL),
(2, 'Marathon Race', 'Life at Gallantt', 'Event', '<p>Gallantt Group employees came together in stride and spirit, participating in a marathon that celebrated fitness, unity, and our shared commitment to a stronger tomorrow.</p>', 'MEDIA_20250520091102_612.jpeg', 'image', '2025-04-05', '2025-05-20 14:11:02', 'live', NULL, NULL),
(3, 'almaty tour', 'Life at Gallantt', 'Event', '<p>Moments from our Almaty dealer tour — where partnerships grow stronger through shared experiences, cultural discovery, and the spirit of the Gallantt family.</p>', 'MEDIA_20250520090527_202.jpeg', 'image', '2025-04-05', '2025-05-20 14:05:27', 'live', NULL, NULL),
(4, 'Baba Ramdev Fecilitation', 'Corporate Highlights', 'Stories', '<p>Gallantt Group’s CMD, Shri C.P. Agarwal, warmly felicitating Baba Ramdev at his residence in Gorakhpur — a moment of mutual respect and shared values.</p>', 'MEDIA_20250520092443_203.jpeg', '', '2025-04-14', '2025-05-20 14:25:42', 'live', NULL, NULL),
(5, 'Architect & Engineer Meet', 'Corporate Highlights', 'Event', '<p>Gallantt Group’s 2025 Architect &amp; Engineer Meet in Gorakhpur brought together industry experts for a day of innovation, collaboration, and future-focused conversations in construction.</p>', 'MEDIA_20250520092807_117.jpg', 'image', '2025-05-07', '2025-05-20 14:28:07', 'live', NULL, NULL),
(6, 'Vice President fecilitation ', 'Corporate Highlights', 'News', '<p>Gallantt Group’s CMD, Shri C.P. Agarwal, had the honour of felicitating Hon’ble Vice President of India, Shri Jagdeep Dhankhar — a proud moment of respect and recognition.</p>', 'MEDIA_20250520092041_240.jpeg', 'image', '2025-03-01', '2025-05-20 14:20:41', 'live', NULL, NULL),
(7, 'ABP Ideas of India', 'Corporate Highlights', 'News', '<p>Mr. Mayank Agarwal, CEO of Gallantt Group, engaged in a thought-provoking fireside chat with Chetan Bhagat at ABP Ideas of India 2025, Grand Hyatt Mumbai — sharing leadership insights and future vision.</p>', 'MEDIA_20250520095006_948.jpg', '', '2025-04-10', '2025-05-20 14:58:37', 'live', NULL, NULL),
(8, 'ABP ideas of india', 'Corporate Highlights', 'Event', '<p>Mr. Mayank Agarwal, CEO of Gallantt Group, recieveing award at ABP Ideas of India 2025, Grand Hyatt Mumbai —&nbsp;</p>', 'MEDIA_20250520095715_901.jpg', 'image', '2025-05-10', '2025-05-20 14:57:15', 'live', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `web_products`
--

CREATE TABLE `web_products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_products`
--

INSERT INTO `web_products` (`id`, `name`) VALUES
(1, 'Fe550D TMT Rebars');

-- --------------------------------------------------------

--
-- Table structure for table `web_reportcategories`
--

CREATE TABLE `web_reportcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_reportcategories`
--

INSERT INTO `web_reportcategories` (`id`, `name`, `status`) VALUES
(1, 'Polices and Codes', 1),
(2, 'Investors Information', 1),
(3, 'Environment Clearance', 1),
(4, 'Amalgamation 2020', 1);

-- --------------------------------------------------------

--
-- Table structure for table `web_reports`
--

CREATE TABLE `web_reports` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_reports`
--

INSERT INTO `web_reports` (`id`, `filename`, `uploaded_on`) VALUES
(7, 'RCP_LATEST_POST_20_05_2025.pdf', '2025-05-20 15:33:47');

-- --------------------------------------------------------

--
-- Table structure for table `web_reportsubcategories`
--

CREATE TABLE `web_reportsubcategories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_reportsubcategories`
--

INSERT INTO `web_reportsubcategories` (`id`, `category_id`, `name`, `status`) VALUES
(6, 1, 'Code of Conduct', 1),
(7, 1, 'Whistle Blower Policy', 1),
(8, 2, 'Performance', 1),
(9, 2, 'Shareholder Information', 1),
(10, 3, 'Monitoring Reports', 1),
(11, 1, 'Related Party Transaction Policy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `web_resourcecategories`
--

CREATE TABLE `web_resourcecategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_resourcecategories`
--

INSERT INTO `web_resourcecategories` (`id`, `name`) VALUES
(12, 'Product Brochure'),
(11, 'test'),
(13, 'Testimonials');

-- --------------------------------------------------------

--
-- Table structure for table `web_resources`
--

CREATE TABLE `web_resources` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `resource_name` varchar(255) NOT NULL,
  `file_type` enum('doc','video') NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_resources`
--

INSERT INTO `web_resources` (`id`, `category_id`, `resource_name`, `file_type`, `file_path`, `created_at`) VALUES
(2, 12, 'brochure corporate', 'doc', 'RES_2025_05_08_100624_412_Newspaper_33x46.pdf', '2025-05-08 15:06:25'),
(3, 12, 'Cement Leaflet', 'doc', 'RES_2025_05_21_014838_322_OPC leaflet_2.pdf', '2025-05-21 06:48:38'),
(5, 13, 'dealer testimonial ', 'video', 'https://www.youtube.com/shorts/1NoVcAhxjpc', '2025-06-03 14:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `web_sections`
--

CREATE TABLE `web_sections` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `consumer_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_sections`
--

INSERT INTO `web_sections` (`id`, `state_id`, `district_id`, `product_id`, `section`, `consumer_price`, `created_at`) VALUES
(23, 1, 165, 1, '8 mm', 344.00, '2025-05-27 12:15:09'),
(24, 1, 165, 1, '10mm', 522.00, '2025-05-27 12:15:09'),
(25, 1, 165, 1, '12 mm', 752.00, '2025-05-27 12:15:09'),
(26, 1, 165, 1, '16 mm', 1337.00, '2025-05-27 12:15:09'),
(27, 1, 165, 1, '20mm', 2089.00, '2025-05-27 12:15:09'),
(28, 1, 165, 1, '25 mm', 3264.00, '2025-05-27 12:15:09'),
(29, 1, 34, 1, '8 mm', 344.00, '2025-06-12 13:37:07'),
(30, 1, 34, 1, '10mm', 522.00, '2025-06-12 13:37:07'),
(31, 1, 34, 1, '12 mm	', 752.00, '2025-06-12 13:37:07'),
(32, 1, 34, 1, '16 mm	', 1337.00, '2025-06-12 13:37:07'),
(33, 1, 34, 1, '20mm	', 2089.00, '2025-06-12 13:37:07'),
(34, 1, 34, 1, '25 mm', 3264.00, '2025-06-12 13:37:07');

-- --------------------------------------------------------

--
-- Table structure for table `web_states`
--

CREATE TABLE `web_states` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_states`
--

INSERT INTO `web_states` (`id`, `name`) VALUES
(1, 'Uttar Pradesh'),
(2, 'Gujarat');

-- --------------------------------------------------------

--
-- Table structure for table `web_subscribers`
--

CREATE TABLE `web_subscribers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_subscribers`
--

INSERT INTO `web_subscribers` (`id`, `email`, `created_at`) VALUES
(1, 'sridharjnet@gmail.com', '2025-05-08 09:41:29'),
(2, 'akj230875@gmail.com', '2025-06-12 12:59:39');

-- --------------------------------------------------------

--
-- Table structure for table `web_users`
--

CREATE TABLE `web_users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web_users`
--

INSERT INTO `web_users` (`id`, `email`, `password`) VALUES
(1, 'test', '$2y$10$mIoiB644SyLjBSFmeKmpVedfkBFfI5j20PP47nrFU0p0V3EFAzxVK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `business_brochures`
--
ALTER TABLE `business_brochures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_banners`
--
ALTER TABLE `web_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_blogs`
--
ALTER TABLE `web_blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `web_contactform`
--
ALTER TABLE `web_contactform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_corporatereports`
--
ALTER TABLE `web_corporatereports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_districts`
--
ALTER TABLE `web_districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_employeewelfare`
--
ALTER TABLE `web_employeewelfare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_financialhighlight`
--
ALTER TABLE `web_financialhighlight`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_financialreports`
--
ALTER TABLE `web_financialreports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_homepagevideo`
--
ALTER TABLE `web_homepagevideo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_investorreportheading`
--
ALTER TABLE `web_investorreportheading`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_investorreports`
--
ALTER TABLE `web_investorreports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_jobapplication`
--
ALTER TABLE `web_jobapplication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_jobs`
--
ALTER TABLE `web_jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `web_mediagallery`
--
ALTER TABLE `web_mediagallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_products`
--
ALTER TABLE `web_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_reportcategories`
--
ALTER TABLE `web_reportcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_reports`
--
ALTER TABLE `web_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_reportsubcategories`
--
ALTER TABLE `web_reportsubcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `web_resourcecategories`
--
ALTER TABLE `web_resourcecategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `web_resources`
--
ALTER TABLE `web_resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `web_sections`
--
ALTER TABLE `web_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`),
  ADD KEY `district_id` (`district_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `web_states`
--
ALTER TABLE `web_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_subscribers`
--
ALTER TABLE `web_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_users`
--
ALTER TABLE `web_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business_brochures`
--
ALTER TABLE `business_brochures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `web_banners`
--
ALTER TABLE `web_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `web_blogs`
--
ALTER TABLE `web_blogs`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `web_contactform`
--
ALTER TABLE `web_contactform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `web_corporatereports`
--
ALTER TABLE `web_corporatereports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `web_districts`
--
ALTER TABLE `web_districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `web_employeewelfare`
--
ALTER TABLE `web_employeewelfare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `web_financialhighlight`
--
ALTER TABLE `web_financialhighlight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `web_financialreports`
--
ALTER TABLE `web_financialreports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_homepagevideo`
--
ALTER TABLE `web_homepagevideo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `web_investorreportheading`
--
ALTER TABLE `web_investorreportheading`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_investorreports`
--
ALTER TABLE `web_investorreports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `web_jobapplication`
--
ALTER TABLE `web_jobapplication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `web_jobs`
--
ALTER TABLE `web_jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `web_mediagallery`
--
ALTER TABLE `web_mediagallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `web_products`
--
ALTER TABLE `web_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `web_reportcategories`
--
ALTER TABLE `web_reportcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `web_reports`
--
ALTER TABLE `web_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `web_reportsubcategories`
--
ALTER TABLE `web_reportsubcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `web_resourcecategories`
--
ALTER TABLE `web_resourcecategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `web_resources`
--
ALTER TABLE `web_resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `web_sections`
--
ALTER TABLE `web_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `web_states`
--
ALTER TABLE `web_states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `web_subscribers`
--
ALTER TABLE `web_subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `web_reportsubcategories`
--
ALTER TABLE `web_reportsubcategories`
  ADD CONSTRAINT `web_reportsubcategories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `web_reportcategories` (`id`);

--
-- Constraints for table `web_resources`
--
ALTER TABLE `web_resources`
  ADD CONSTRAINT `web_resources_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `web_resourcecategories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
