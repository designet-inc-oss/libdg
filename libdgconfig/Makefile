LIBNAME=libdgconfig
CFLAGS=-g 
DYNAMICLIB=$(LIBNAME).so
STATICLIB=$(LIBNAME).a

all:: $(DYNAMICLIB) $(STATICLIB)

$(DYNAMICLIB): $(LIBNAME).c $(LIBNAME).h 
	cc $(CFLAGS) -shared -fPIC $(LIBNAME).c -o $@

$(STATICLIB): $(LIBNAME).o
	ar cr $@ $(LIBNAME).o 
	ranlib $@

$(LIBNAME).o: $(LIBNAME).c $(LIBNAME).h
	cc $(CFLAGS) -c $(LIBNAME).c

test:
	cd ../test; make test

clean:
	rm -f $(DYNAMICLIB) $(STATICLIB) $(LIBNAME).o
