﻿-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-12-27 08:31:41
-- 服务器版本： 5.7.11
-- PHP Version: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

--
-- Database: `phpdemo`
--

-- --------------------------------------------------------

--
-- 表的结构 `014`
--

CREATE TABLE `014` (
  `id` int(5) NOT NULL,
  `title` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `contents` text NOT NULL,
  `hits` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `014`
--

INSERT INTO `014` (`id`, `title`, `date`, `contents`, `hits`) VALUES
(9, '那些回忆 ', '2016-10-25', '淡漠出咸苦的日子里，脑海中无法忘却的那些记忆，点点滴滴汇集到一起，泼洒出去，却总也不能绘描出那完整的美丽。总是在匆匆的暮色里，还来不及和那池中青莲说完心话，太阳就落下去，一如当时的列车，呼啸而去，哽咽在心头的是千般万般的不舍和离愁。', 17),
(17, '梦里几许，人生几何', '2016-10-25', ' 秋尽，冬至，风牵扯衣袖，肆意的穿过每一道缝隙，亲吻着每一寸肌肤，情不自禁抱紧双臂把冬天就这样揽入怀中。\r\n\r\n　　坐在窗前，怀抱冷幽的灯光，偷听着风与花的私语，莫名的伤感爬上心头。风飘过的瞬间，手指尖触痛键盘的冰凉，轻轻叩响记忆的门，敲开心底尘封的那扇窗。心里荡起的涟漪，溅起了满地灰尘，在这幽冷的夜里飘转，沉浮，悠然的与影子一起品尝着光的孤寂。\r\n\r\n　　夜深露重，只有缕缕寂寥伴着心扉，望着寒星点点的苍穹，任思绪在寒风中流浪，让心随风飘荡。我努力的寻找，寻找曾经绽放在生命的幽深处的那份淡然与从容。几曾何时，不知是城市的高楼迷惑了双眼，还是钢筋砼的冰凉阻隔了人性的善良，让冷漠遍地开花。梦里几许，人生几何，让我们用爱把这个冬季的苍凉消融吧。\r\n\r\n　　冬天的午夜，雾起，霜着，树叶收敛白天的热情，任露珠纠缠依附，最后只听见一声自怜的叹息滴落。路灯与影子孤单相守，天边千年不变的月芽儿偷窥着，雾禁不住暧昧的灯光的诱惑，在寒风中与光束缠绵起舞。风冷情幽，柔情依旧，我站在原地，等待你许我的几世温柔。\r\n\r\n　　人生总要经过几道十字路口，艰难的抉择强暴了昨夜的梦，任他在冬夜的凄风中挣扎、徘徊、无助。 如果积攒几缕墨香就可换你今生与来世的期许，我愿是你心中书写流年的笔尖，为你勾画百年得以修来一瞬的深情回眸。如果甘洌的酒可以清除你眉间深锁的一抹轻愁，我愿是你杯中陈年的酒，日日与你唇齿相依。如果氤氲的烟云穿过你杂乱的思绪，就能解开人生的困惑，我愿是你指间迷恋火柴的香烟，用燃烧生命的激情拂动心底的灰。\r\n\r\n　　梦里几许，人生几何，纵有万般不舍，我尊重你的选择，只希望你快乐。请相信我就站在你身后，不用回头也能看见素颜的我。\r\n\r\n　　【作者：千雪】', 7),
(10, '相思', '2016-10-25', '相思如此沉稳，泪水如此的平衡，被情困的心，被梦落的痕，心中简单的情份，落下了多少的伤痕，走在婉转的思绪里，付出的时间，换来心田的悲伤，走在无助的季节，得到的是脆弱的痕迹，让难分的泪滴盘旋在相思的路上，一份相思一份泪，泪洗相思过往人。', 0),
(11, '优雅', '2016-10-25', '优雅是一种淡然的美，是一个人内心美的外露。优雅之人心如止水，波澜不惊，不以物喜，不以己悲。人生渴望优雅的生活，却常常在现实失去自我，随波逐流。要想找回自己，做一个优雅从容的人，只有先稳下来，静下来，学会宽容仁爱温和谦恭。人生，因静而从容，因从容而优雅。', 3),
(12, '淡定', '2016-10-25', ' 淡定，不是看破红尘，不思进取，是经过岁月磨砺后的沉稳含蓄;淡定，不是不屑一切，不顾一切，是历经世事变迁后的从容淡薄。淡定的人，善待生命，沉稳而不缺少热情;淡定的人，处事不惊，安详而不缺乏快意。淡定的人生，历尽沧桑，却依然呈现随遇而安的美丽淡然。', 0),
(13, '时光静好1', '2016-10-25', '喜欢共听一首歌，让那熟悉的旋律一遍又一遍地在曾经的故事里游弋，任那暖暖的思绪蔓延，在这温晴的日子里酿成一杯甜甜的酒，浅斟慢饮，把时光的静好在彼此心中一点一点地拉长，写成缱绻。愿意把一切的纷繁抛开，不让纠结来打扰，就这样默默地守望，就这样幸福地交流。时光的路口，你浅浅的笑伫立成一道清秀的风景。', 7),
(18, '茅檐低小，溪上青青草', '2016-10-25', '"茅檐低小，溪上青青草。"\r\n\r\n　　心中一直珍藏着这样一幅山居图。这样安静的小屋，远离世间的繁华与嘈杂，这样安静的小屋，有着简静质朴的生活，在这里，可以删繁就简悠闲从容自在随意。不必在清晨的第一时间里梳洗打扮匆匆奔赴在赶往单位的路上，不必为不必要的纷争苦闷烦忧，不必为领导下达的指令苦思冥想辗转难眠。\r\n\r\n　　这样安静的小屋，蓝的天空下祥云终日环绕，门外一颗桃树，每当春日来临，桃花灼灼，而我，可以穿上心仪的棉麻衣裙，于树下摆一张木桌两把竹椅，斟上一杯绿茶，于茶香袅袅间聆听林间鸟儿的鸣唱，看彩蝶飞舞与枝间花上，更可以在这最净美的时光里打开一本书，或者是更早的线装书，静心细读。清风拂过，片片桃花飘飞，落在桌上书页间，落在头上颈间发髻，轻柔，飘然，宛如一首清新的小诗，宛如一首梦幻般的轻音乐，更宛如一首唐朝的小令，空灵委婉，清丽含蓄，空气里弥漫着点点的香甜，若无若有，却就能这样轻易地漫过我的心扉并为之震颤。白音格力说，“清喜，往往只是花开一场，但一定有清雅姿态，即使影子被风吹薄，仍是幽谷水袖，袅娜仪态”，那么，眼前，何尝不是清喜，美好的清喜呢……\r\n\r\n　　这样安静的小屋里，又或者可以细细地研墨，轻轻的打开宣纸，毛尖轻触宣纸的一霎，一首无言的小诗便在心中流淌。国画，虽寥寥几笔，但表达的意境却是无止境的。登高望远，山正高，水更长，树更绿，花争艳，有山日空濛，有山雨欲来，有水中石潭，有春夜喜雨，有明月清泉，有春日柳烟，有亭亭夏荷，有傲霜秋菊，有雪中红梅...这些看似简单的字画，陶冶着情操，不知不觉间，会被自然间的万事万物感动着，每一处景，每一幅画所表达的所流淌的，无不是它们内心深处最自然的声音，尽管我们听不到，但我们完全可以看得到。\r\n\r\n　　起身，转头，清风拂过面颊长发衣裙，顿感心旷神怡，发丝衣袂翻飞，心中被这种莫名的幸福感动填的满满的，移步庭院，一溪山泉唱着欢快的歌谣哗啦啦的从眼前经过，清澈的小溪中晃动着山影树影，模糊着拉长着奔涌向前，日复一日，从不知疲倦。记得一位诗人在描写山泉时说，你弃去的是糟粕，吸取的是精华，你呀你，你的目标是永远奔向大海。或许，这条小溪永不停歇的目标也正是如此.....\r\n\r\n　　屋后，大片茂林修竹，清晨傍晚，清风来临，枝叶嬉戏且随风轻歌曼舞，如同一群长袖善舞的美女，有风即作袅娜之态，无风亦呈洒脱之姿，令人心醉不已。深深地呼吸，整个身体里满满的清新宁静。坐在明亮的落地窗前，常常这样如醉如痴地凝望，不问晨昏，不问时光几何，只因这里每一滴水都能诞生一首诗，每一处风景都可以构思一幅图画。\r\n\r\n　　山居岁月，如同一面清澈的瓦尔登湖水，时时刻刻，悬挂在心灵的深深处。', 12),
(23, '我高兴', '2016-10-30', '没烦恼', 0),
(24, '成功', '2016-10-30', '成功', 0),
(25, '11', '2016-10-30', '1', 0),
(26, '2', '2016-10-30', '2', 0),
(27, '3', '2016-10-30', '3', 0),
(28, '4', '2016-10-30', '4', 0),
(29, '44', '2016-10-30', '44', 0),
(30, '2222', '2016-10-30', '222', 0),
(31, '222', '2016-10-30', '22222', 0),
(32, '1111', '2016-10-30', '1111', 0),
(33, '3333', '2016-10-30', '3333', 0),
(34, '123', '2016-12-14', '123', 0),
(22, '我今天发表了一篇博客', '2016-10-25', '今天很开心，做了个微型博客系统。 ', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `014`
--
ALTER TABLE `014`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `014`
--
ALTER TABLE `014`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;